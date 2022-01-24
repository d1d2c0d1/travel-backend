<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\City;
use App\Models\Country;
use App\Models\Language;
use App\Models\Region;
use Illuminate\Http\Request;
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
        $languages = Cache::remember('locations.languages', 86400, function() {
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
        $countries = Cache::remember('locations.countries', 86400, function() {
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
        $regions = Cache::remember("locations.regions-{$countryId}", 86400, function() use ($countryId) {
            if( $countryId <= 0 ) {
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

        $countryId = (int) $request->get('country_id', 0);
        $regionId = (int) $request->get('region_id', 0);

        $countries = Cache::remember("locations.countries-{$countryId}-{$regionId}", 86400, function() use ($countryId, $regionId) {
            if( $countryId >= 1 && $regionId <= 0 ) {
                return City::where('country_id', $countryId)->get();

            } elseif( $countryId <= 0 && $regionId >= 1 ) {
                return City::where('region_id', $regionId)->get();

            } elseif( $countryId >= 1 && $regionId >= 1 ) {
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

        $countryId = (int) $request->get('country_id', 0);
        $regionId = (int) $request->get('region_id', 0);
        $cityId = (int) $request->get('city_id', 0);

        // Get areas from cache or db
        $areas = Cache::remember("locations.city-{$countryId}-{$regionId}-{$cityId}", 86400, function() use ($countryId, $regionId, $cityId) {

            $areasQuery = Area::where([
                ['id', '>=', 1]
            ]);

            if( $countryId >= 1 ) {
                $areasQuery->where('country_id', $countryId);
            }

            if( $regionId >= 1 ) {
                $areasQuery->where('region_id', $regionId);
            }

            if( $cityId >= 1 ) {
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

        $cities = Cache::remember("cities-search-{$search}", 86400, function() use ($search) {
           return City::where([
               ['name', 'like', "%{$search}%"]
           ])->limit(5)->get();
        });

        return [
            'status' => true,
            'data' => $cities
        ];
    }

}
