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
use function Webmozart\Assert\Tests\StaticAnalysis\string;

class LocationController extends Controller
{

    /**
     * Route for get all languages
     *
     * @return array
     */
    public function languages(): array
    {
        return [
            'status' => true,
            'data' => Language::all()
        ];
    }

    /**
     * Route for getting countries array
     *
     * @return array
     */
    public function countries(): array
    {
        return [
            'status' => true,
            'data' => Country::all()
        ];
    }

    /**
     * Route for getting regions array
     *
     * @param int $countryId
     * @return array
     */
    public function regions(int $countryId = 0): array
    {
        $regionDB = Region::with('cities')->with('country');

        if ($countryId <= 0) {
            $regions = $regionDB->get();
        } else {
            $regions = $regionDB->where('country_id', $countryId)->get();
        }

        return [
            'status' => true,
            'data' => $regions
        ];
    }

    /**
     * Route for getting cities array
     *
     * @param Request $request
     * @return array
     */
    public function cities(Request $request): array
    {

        $countryId = (int)$request->get('country_id', 0);
        $regionId = (int)$request->get('region_id', 0);

        if ($countryId >= 1 && $regionId <= 0) {
            $countries = City::where('country_id', $countryId)->get();

        } elseif ($countryId <= 0 && $regionId >= 1) {
            $countries = City::where('region_id', $regionId)->get();

        } elseif ($countryId >= 1 && $regionId >= 1) {
            $countries = City::where([
                ['country_id', '=', $countryId],
                ['region_id', '=', $regionId],
            ])->get();

        } else {
            $countries = City::all();
        }

        return [
            'status' => true,
            'data' => $countries
        ];
    }

    /**
     * Route for getting areas array
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
     * Search region by text name
     *
     * @param Request $request
     * @return Response|array
     */
    public function searchRegions(Request $request): Response|array
    {
        $search = $request->get('search');
        $countryId = $request->get('country_id', 0);

        if (mb_strlen($search) <= 3) {
            return response(MainHelper::getErrorResponse([
                MainHelper::getErrorItem(412, 'Region name is empty or very short!')
            ]), 412);
        }

        if (mb_strlen($search) >= 255) {
            return response(MainHelper::getErrorResponse([
                MainHelper::getErrorItem(412, 'Region name is too long!')
            ]), 412);
        }

        $regions = Cache::remember("regions-search-{$search}-{$countryId}", 86400, function () use ($countryId, $search) {

            $regionQuery = Region::where([
                ['name', 'like', "%{$search}%"]
            ]);

            if ($countryId >= 1) {
                $regionQuery->where('country_id', $countryId);
            }

            return $regionQuery->limit(5)->get();

        });

        return [
            'status' => true,
            'data' => $regions
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

        $cities = City::where([
            ['name', 'like', "%{$search}%"]
        ])->limit(10)->get();

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
    public function validateCity(Request $request, int $id = 0): Response|array
    {

        $countryId = (int)$request->input('country_id', 0);
        $regionId = (int)$request->input('region_id', 0);
        $name = (string)$request->input('name', '');
        $title = (string)$request->input('title', '');
        $description = (string)$request->input('description', '');
        $image = (string)$request->input('image', '');
        $faq = (string)$request->input('faq', '[]');
        $album = (array)$request->input('album', '[]');

        if ($countryId <= 0) {
            return response(MainHelper::getErrorResponse([
                MainHelper::getErrorItem(412, 'Country ID is empty!')
            ]), 412);
        }

        if ($regionId <= 0) {
            return response(MainHelper::getErrorResponse([
                MainHelper::getErrorItem(412, 'Region ID is empty!')
            ]), 412);
        }

        if (mb_strlen($name) <= 3) {
            return response(MainHelper::getErrorResponse([
                MainHelper::getErrorItem(412, 'City name is empty or very short!')
            ]), 412);
        }

        if (mb_strlen($title) <= 3) {
            return response(MainHelper::getErrorResponse([
                MainHelper::getErrorItem(412, 'City title for filter is empty or very short!')
            ]), 412);
        }

        if (mb_strlen($description) <= 12) {
            return response(MainHelper::getErrorResponse([
                MainHelper::getErrorItem(412, 'City description for filter is empty or very short!')
            ]), 412);
        }

        if (mb_strlen($image) <= 3) {
            return response(MainHelper::getErrorResponse([
                MainHelper::getErrorItem(412, 'City image is empty or not corrected!')
            ]), 412);
        }


        if (mb_strlen($faq) <= 12) {
            return response(MainHelper::getErrorResponse([
                MainHelper::getErrorItem(412, 'FAQ for city is empty!')
            ]), 412);
        }

        if (count($album) <= 0 || gettype($album) != 'array') {
            return response(MainHelper::getErrorResponse([
                MainHelper::getErrorItem(412, 'City image is empty or not corrected!')
            ]), 412);
        }

        if (!MainHelper::isAdminOrModer()) {
            return response(MainHelper::getErrorResponse([
                MainHelper::getErrorItem(412, 'Permission denied!')
            ]), 401);
        }

        $repeatCities = City::where([
            ['name', '=', $name],
            ['region_id', '=', $regionId],
            ['country_id', '=', $countryId]
        ])->get();

        if (!$repeatCities->isEmpty() && $id <= 0) {
            return response(MainHelper::getErrorResponse([
                MainHelper::getErrorItem(409, 'Repeat city in country and region!')
            ]), 401);
        }

        if (!$repeatCities->isEmpty() && $id >= 1) {
            foreach ($repeatCities as $city) {
                if ($city->id != $id && $city->name === $name) {
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
            'faq' => $faq,
            'seo_title' => (string)$request->input('seo_title'),
            'seo_description' => (string)$request->input('seo_description'),
            'album' => $album
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

        if (!is_array($validator) || $validator['country_id'] <= 0) {
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
        $city->code = MainHelper::cyr2lat($validator['name']);
        $city->seo_title = $validator['seo_title'];
        $city->seo_description = $validator['seo_description'];
        $city->album = $validator['album'];


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

        if (!is_array($validator) || $validator['country_id'] <= 0) {
            return $validator;
        }

        $city = City::find($id);

        if (!$city || !$city?->id) {
            return response(MainHelper::getErrorResponse([
                MainHelper::getErrorItem(412, 'City ID is empty!')
            ]), 412);
        }

        if ($city->country_id != $validator['country_id']) {
            $city->country_id = $validator['country_id'];
        }

        if ($city->region_id != $validator['region_id']) {
            $city->region_id = $validator['region_id'];
        }

        if ($city->name != $validator['name']) {
            $city->name = $validator['name'];
        }

        if ($city->title != $validator['title']) {
            $city->title = $validator['title'];
        }

        if ($city->description != $validator['description']) {
            $city->description = $validator['description'];
        }

        if ($city->seo_title != $validator['seo_title']) {
            $city->seo_title = $validator['seo_title'];
        }

        if ($city->seo_description != $validator['seo_description']) {
            $city->seo_description = $validator['seo_description'];
        }

        if ($city->image != $validator['image']) {
            $city->image = $validator['image'];
        }

        if ($city->album != $validator['album']) {
            $city->album = $validator['album'];
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
