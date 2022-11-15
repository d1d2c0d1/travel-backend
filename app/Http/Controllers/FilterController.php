<?php

namespace App\Http\Controllers;

use App\Http\Helpers\MainHelper;
use App\Models\CardCategory;
use App\Models\City;
use App\Models\Filter;
use App\Models\ItemType;
use App\Models\Property;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FilterController extends Controller
{

    /**
     * Create filter
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {

        $createdUser = MainHelper::getUser();
        $filterData = (array) $request->input('filter');
        $isUseType = (boolean) $request->input('add_type');
        $isUseCity = (boolean) $request->input('add_city');
        $slug = '';

        if( !$filterData ) {
            return response([
                'status' => false,
                'error' => 'Filtering data not sending'
            ], 419);
        }

        // Prepare type
        if( $isUseType && isset($filterData['type_id']) && (int) $filterData['type_id'] >= 1 ) {
            $type = ItemType::find((int) $filterData['type_id']);
            $slug .= $type->code;
        }

        // Prepare city
        if( $isUseCity && isset($filterData['city_id']) && (int) $filterData['city_id'] >= 1 ) {
            $city = City::find((int) $filterData['city_id']);
            $slug .= empty($slug) ? $city->code : '-' . $city->code;
        }

        // Prepare categories
        if( isset($filterData['categories']) && (array) $filterData['categories'] ) {
            $categories = CardCategory::select(['id','code'])->whereIn('id', (array) $filterData['categories'])->get();

            foreach ($categories as $category) {
                $slug .= empty($slug) ? $category->code : '-' . $category->code;
            }
        }

        // Prepare properties
        if( isset($filterData['properties']) && (array) $filterData['properties'] ) {

            $propertyIds = [];
            $filterProperties = (array) $filterData['properties'];

            foreach ($filterProperties as $propertyId => $property) {
                $propertyIds[] = $propertyId;
            }

            $properties = Property::select(['id','code'])->whereIn('id', $propertyIds)->get();

            foreach ($properties as $property) {
                $slug .= '-' . $property->code . '-' . MainHelper::cyr2lat($filterProperties[$property->id]);
            }
        }

        $arFields = [
            'slug' => $slug,
            'filter' => $filterData
        ];

        if( $createdUser && $createdUser?->id >= 1 ) {
            $arFields['created_user_id'] = $createdUser->id;
        }

        $filter = new Filter($arFields);

        try {
            $filter->save();
        } catch (Exception $e) {

            if( $e->getCode() === "23000" ) {
                $filter = Filter::where('slug', '=', $slug)->get();
            } else {
                return response([
                    'status' => false,
                    'error' => 'Database error',
                    'database_error' => $e->getMessage(),
                    'database_error_code' => $e->getCode()
                ], 500);
            }

        }

        return response([
            'status' => true,
            'data' => $filter
        ]);
    }

}
