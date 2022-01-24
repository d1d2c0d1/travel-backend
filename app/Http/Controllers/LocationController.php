<?php

namespace App\Http\Controllers;

use App\Http\Helpers\MainHelper;
use App\Models\Area;
use App\Models\City;
use App\Models\Country;
use App\Models\Language;
use App\Models\Region;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

class LocationController extends Controller
{

    /**
     * Route for get all languages
     *
     * @return array
     */
    public function languages(): array
    {
        $languages = Cache::remember('locations.languages', 86400, function () {
            return Language::all();
        });

        return [
            'status' => true,
            'data' => $languages
        ];
    }

    /**
     * Route for getting countries array
     *
     * @return array
     */
    public function countries(): array
    {
        $countries = Cache::remember('locations.countries', 86400, function () {
            return Country::all();
        });

        return [
            'status' => true,
            'data' => $countries
        ];
    }

    /**
     * Route for getting regions
     *
     * @param int $countryId
     * @return array
     */
    public function regions(int $countryId = 0): array
    {
        $regions = Cache::remember("locations.regions-{$countryId}", 86400, function () use ($countryId) {
            if ($countryId <= 0) {
                return Region::all();
            } else {
                return Region::where('country_id', $countryId)->get();
            }
        });

        return [
            'status' => true,
            'data' => $regions
        ];
    }

    /**
     * Route for getting regions
     *
     * @param Request $request
     * @return array
     */
    public function cities(Request $request): array
    {

        $countryId = (int)$request->get('country_id', 0);
        $regionId = (int)$request->get('region_id', 0);

        $countries = Cache::remember("locations.countries-{$countryId}-{$regionId}", 86400, function () use ($countryId, $regionId) {
            if ($countryId >= 1 && $regionId <= 0) {
                return City::where('country_id', $countryId)->get();

            } elseif ($countryId <= 0 && $regionId >= 1) {
                return City::where('region_id', $regionId)->get();

            } elseif ($countryId >= 1 && $regionId >= 1) {
                return City::where([
                    ['country_id', '=', $countryId],
                    ['region_id', '=', $regionId],
                ])->get();

            } else {
                return City::all();
            }
        });

        return [
            'status' => true,
            'data' => $countries
        ];
    }

    /**
     * Route for getting cities
     *
     * @param Request $request
     * @return array
     */
    public function areas(Request $request): array
    {

        $countryId = (int)$request->get('country_id', 0);
        $regionId = (int)$request->get('region_id', 0);
        $cityId = (int)$request->get('city_id', 0);

        // Get areas from cache or db
        $areas = Cache::remember("locations.city-{$countryId}-{$regionId}-{$cityId}", 86400, function () use ($countryId, $regionId, $cityId) {

            $areasQuery = Area::where([
                ['id', '>=', 1]
            ]);

            if ($countryId >= 1) {
                $areasQuery->where('country_id', $countryId);
            }

            if ($regionId >= 1) {
                $areasQuery->where('region_id', $regionId);
            }

            if ($cityId >= 1) {
                $areasQuery->where('city_id', $cityId);
            }

            return $areasQuery->get();
        });

        return [
            'status' => true,
            'data' => $areas
        ];
    }

    /**
     * Search city by text name
     *
     * @param Request $request
     * @return array
     */
    public function searchCity(Request $request): array
    {
        $search = $request->get('search');

        $cities = Cache::remember("cities-search-{$search}", 86400, function () use ($search) {
            return City::where([
                ['name', 'like', "%{$search}%"]
            ])->limit(5)->get();
        });

        return [
            'status' => true,
            'data' => $cities
        ];
    }

    /**
     * Validate city request (for create and update)
     *
     * @param Request $request
     * @param int $id
     * @return Response|array
     */
    public function validateCity(Request $request, int $id = 0): Response | array
    {

        $countryId = (int) $request->input('country_id', 0);
        $regionId = (int) $request->input('region_id', 0);
        $name = (string) $request->input('name', '');
        $title = (string) $request->input('title', '');
        $description = (string) $request->input('description', '');
        $image = (string) $request->input('image', '');
        $faq = (string) $request->input('faq', '[]');

        if( $countryId <= 0 ) {
            return response(MainHelper::getErrorResponse([
                MainHelper::getErrorItem(412, 'Country ID is empty!')
            ]), 412);
        }

        if( $regionId <= 0 ) {
            return response(MainHelper::getErrorResponse([
                MainHelper::getErrorItem(412, 'Region ID is empty!')
            ]), 412);
        }

        if( mb_strlen($name) <= 3 ) {
            return response(MainHelper::getErrorResponse([
                MainHelper::getErrorItem(412, 'City name is empty or very short!')
            ]), 412);
        }

        if( mb_strlen($title) <= 3 ) {
            return response(MainHelper::getErrorResponse([
                MainHelper::getErrorItem(412, 'City title for filter is empty or very short!')
            ]), 412);
        }

        if( mb_strlen($description) <= 12 ) {
            return response(MainHelper::getErrorResponse([
                MainHelper::getErrorItem(412, 'City description for filter is empty or very short!')
            ]), 412);
        }

        if( mb_strlen($image) <= 3 ) {
            return response(MainHelper::getErrorResponse([
                MainHelper::getErrorItem(412, 'City image is empty or not corrected!')
            ]), 412);
        }

        if( mb_strlen($faq) <= 12 ) {
            return response(MainHelper::getErrorResponse([
                MainHelper::getErrorItem(412, 'FAQ for city is empty!')
            ]), 412);
        }

        if( !MainHelper::isAdminOrModer() ) {
            return response(MainHelper::getErrorResponse([
                MainHelper::getErrorItem(412, 'Permission denied!')
            ]), 401);
        }

        $repeatCities = City::where([
            ['name', '=', $name],
            ['region_id', '=', $regionId],
            ['country_id', '=', $countryId]
        ])->get();

        if( !$repeatCities->isEmpty() && $id <= 0 ) {
            return response(MainHelper::getErrorResponse([
                MainHelper::getErrorItem(409, 'Repeat city in country and region!')
            ]), 401);
        }

        if( !$repeatCities->isEmpty() && $id >= 1 ) {
            foreach ($repeatCities as $city) {
                if( $city->id != $id && $city->name === $name ) {
                    return response(MainHelper::getErrorResponse([
                        MainHelper::getErrorItem(409, 'Repeat city in country and region!')
                    ]), 401);
                }
            }
        }

        return [
            'country_id' => $countryId,
            'region_id' => $regionId,
            'name' => $name,
            'title' => $title,
            'description' => $description,
            'image' => $image,
            'faq' => $faq
        ];
    }

    /**
     * Create city
     *
     * @param Request $request
     * @return Response
     */
    public function createCity(Request $request): Response
    {
        $validator = $this->validateCity($request);

        if( !is_array($validator) || $validator['country_id'] <= 0 ) {
            return $validator;
        }

        $city = new City();

        $city->country_id = $validator['country_id'];
        $city->region_id = $validator['region_id'];
        $city->name = $validator['name'];
        $city->title = $validator['title'];
        $city->description = $validator['description'];
        $city->image = $validator['image'];
        $city->faq = $validator['faq'];

        try {
            $city->save();
        } catch (Exception $e) {
            return response(MainHelper::getErrorResponse([
                MainHelper::getErrorItem(422, 'Database error. Row can\'t be inserted to db!'),
                MainHelper::getErrorItem(500, $e->getMessage())
            ]), 422);
        }

        return response(MainHelper::getResponse($city?->id >= 2, $city->toArray()));
    }

    /**
     * Update city
     *
     * @param int $id
     * @param Request $request
     * @return Response
     */
    public function updateCity(int $id, Request $request): Response
    {
        $validator = $this->validateCity($request, $id);

        if( !is_array($validator) || $validator['country_id'] <= 0 ) {
            return $validator;
        }

        $city = City::find($id);

        if( !$city || !$city?->id ) {
            return response(MainHelper::getErrorResponse([
                MainHelper::getErrorItem(412, 'City ID is empty!')
            ]), 412);
        }

        if( $city->country_id != $validator['country_id'] ) {
            $city->country_id = $validator['country_id'];
        }

        if( $city->region_id != $validator['region_id'] ) {
            $city->region_id = $validator['region_id'];
        }

        if( $city->name != $validator['name'] ) {
            $city->name = $validator['name'];
        }

        if( $city->title != $validator['title'] ) {
            $city->title = $validator['title'];
        }

        if( $city->description != $validator['description'] ) {
            $city->description = $validator['description'];
        }

        if( $city->image != $validator['image'] ) {
            $city->image = $validator['image'];
        }

        $city->faq = $validator['faq'];

        try {
            $city->save();
        } catch (Exception $e) {
            return response(MainHelper::getErrorResponse([
                MainHelper::getErrorItem(422, 'Database error. Row can\'t be saved to db!'),
                MainHelper::getErrorItem(500, $e->getMessage())
            ]), 422);
        }

        return response(MainHelper::getResponse($city?->id >= 2, $city->toArray()));
    }

}
