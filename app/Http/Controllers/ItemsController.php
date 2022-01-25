<?php

namespace App\Http\Controllers;

use App\Http\Helpers\MainHelper;
use App\Models\City;
use App\Models\Item;
use App\Models\ItemProperty;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ItemsController extends Controller
{

    /**
     * Create item
     *
     * @param Request $request
     * @return Response
     */
    public function create(Request $request): Response
    {

        $arFields = [
            'created_user_id' => MainHelper::getUserId(),
            'owner_user_id' => MainHelper::getUserId(),
            'name' => (string) $request->input('name'),
            'city_id' => (int) $request->input('city_id'),
            'type_id' => (int) $request->input('type_id'),
            'price' => (int) $request->input('price'),
            'phone' => (string) $request->input('phone'),
            'address' => (string) $request->input('address'),
            'description' => (string) $request->input('description'),
        ];

        if( $request->has('area_id') ) {
            $arFields['area_id'] = (int) $request->input('area_id');
        }

        if( !MainHelper::isAdminOrModer() ) {
            return response([
                'status' => false,
                'error' => 'Permission denied'
            ], 401);
        }

        // Getting city from database
        $city = City::find($arFields['city_id']);

        if( !$city || !$city?->id ) {
            return response([
                'status' => false,
                'error' => 'Field city_id is incorrect and not found in database'
            ]);
        }

        $arFields['country_id'] = $city->country_id;
        $arFields['region_id'] = $city->region_id;
        $arFields['code'] = MainHelper::cyr2lat($city->name . '-' . $arFields['name']);

        // Getting images
        $images = (array) $request->input('images');

        if( empty($images) ) {
            return response([
                'status' => false,
                'error' => 'Feild images is empty'
            ]);
        }

        $arFields['images'] = json_encode($images);

        // Create Item
        $item = new Item($arFields);
        $validator = $item->validate();

        if( $validator['status'] === false ) {
            return response([
                'status' => false,
                'error' => 'Bad credentials',
                'validator' => $validator
            ]);
        }

        try {
            $item->save();
        } catch (Exception $e) {
            if( (int) $e->getCode() === 23000 ) {

                return response([
                    'status' => false,
                    'error' => 'Find repeat item'
                ], 410);

            } else {
                return response([
                    'status' => false,
                    'error' => 'Error in database',
                    'dbError' => $e->getMessage(),
                    'dbErrorCode' => (int) $e->getCode()
                ], 500);
            }
        }

        // Save properties
        $properties = $request->input('properties');
        $itemProperties = [];

        foreach ($properties as $property) {
            if( !isset($property['property_id']) || !isset($property['value']) ) {
                continue;
            }

            if( empty($property['property_id']) || $property['property_id'] <= 0 ) {
                continue;
            }

            $arPropertyFields = [
                'item_id' => $item?->id,
                'property_id' => (int) $property['property_id'],
                'value' => (string) $property['value']
            ];

            $itemProperty = ItemProperty::createRow($arPropertyFields);

            try {
                $itemProperty->save();
            } catch (Exception $e) {
                $itemProperties[$property['property_id'] . '_error'] = $e->getMessage();
            }

            $itemProperties[] = $itemProperty;

        }

        $a = 2 + 3;
        return response([
            'status' => true,
            'data' => [
                'item' => $item,
                'properties' => $itemProperties,
            ]
        ]);
    }

}
