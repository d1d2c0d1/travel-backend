<?php

namespace App\Http\Controllers;

use App\Http\Helpers\MainHelper;
use App\Models\CardCategory;
use App\Models\Category;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Controller for using SEO module
 */
class SEOController extends Controller
{

    /**
     * Getting SEO data for filter
     *
     * @param Request $request
     * @return Response
     */
    public function filterData(Request $request): Response
    {
        $result = [
            'title' => '',
            'description' => ''
        ];

        $categorieIds = (array) $request->input('categories');
        $cityId = (int) $request->input('city_id');

        if( $request->has('city_code') ) {
            $cityCode = (string) $request->input('city_code');
            $city = City::where('code', $cityCode)->with('country')->with('region')->first();
        } else {
            $city = City::where('id', $cityId)->with('country')->with('region')->first();
        }

        if( !$city ) {
            return response([
                'status' => false,
                'error' => 'City is not found'
            ], 404);
        }

        $result['title'] = (string) $city->seo_title;
        $result['description'] = (string) $city->seo_description;

        // Construct variables for template replace
        $cityVariables = [
            'city_name' => $city->name,
            'city_title' => $city->title,
            'city_description' => $city->description,
            'city_image' => $city->image,
            'region_name' => $city->region->name,
            'country_name' => $city->country->name,
        ];

        // Replacing
        $result['title'] = MainHelper::replaceTemplate($result['title'], $cityVariables);
        $result['description'] = MainHelper::replaceTemplate($result['description'], $cityVariables);

        // Getting info by selected categories
        if( !empty($categorieIds) ) {
            $categories = CardCategory::whereIn('id', $categorieIds)->with('type')->get();
            $categoryDescriptions = '';

            foreach ($categories as $category) {

                $categoryVariables = [
                    'category_name' => $category->name,
                    'category_description' => $category->description,
                    'category_code' => $category->code,
                    'category_type' => $category->type->name,
                    'category_type_code' => $category->type->code
                ];

                // Concatenate seo description
                $categoryDescription = MainHelper::replaceTemplate((string) $category->seo_description, $categoryVariables);
                $categoryDescription = MainHelper::replaceTemplate($categoryDescription, $cityVariables);
                $categoryDescriptions .= ' ' . $categoryDescription;
            }

            // Create title for filter
            $result['title'] = MainHelper::replaceTemplate($result['title'], [
                'category_description' => $categoryDescriptions
            ]);

            // Create description for filter
            $result['description'] = MainHelper::replaceTemplate($result['description'], [
                'category_description' => $categoryDescriptions
            ]);
        }

        // Clear template
        $result['title'] = MainHelper::clearTemplate($result['title']);
        $result['description'] = MainHelper::clearTemplate($result['description']);

        // Return data
        return response([
            'status' => true,
            'data' => $result
        ]);
    }

}
