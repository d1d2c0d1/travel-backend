<?php

namespace App\Http\Controllers;

use App\Http\Helpers\MainHelper;
use App\Models\CardTag;
use App\Models\Property;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PropertiesController extends Controller
{

    /**
     * Search properties
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response
    {

        $search = (string) $request->input('search');
        $typeId = (int) $request->input('type_id');

        $res = Property::where([
            ['name', 'like', "%{$search}%"]
        ])->orderByDesc('id');

        if( $typeId >= 1 ) {
            $res->where('type_id', $typeId);
        }

        $properties = $res->get();

        return response([
            'status' => true,
            'data' => $properties
        ]);
    }

    /**
     * Create property
     *
     * @param Request $request
     * @return Response
     */
    public function create(Request $request): Response
    {
        $arFields = [
            'name' => (string) $request->input('name'),
            'code' => MainHelper::cyr2lat(((string) $request->input('name')) . rand(10, 1000)),
            'type_id' => (int) $request->input('type_id'),
            'user_id' => MainHelper::getUserId(),
            'default' => (string) $request->input('default'),
        ];

        if( !MainHelper::isAdminOrModer() ) {
            return response([
                'status' => false,
                'error' => 'Permission denied'
            ], 401);
        }

        $property = new Property($arFields);
        $validator = $property->validate();

        if( $validator['status'] === false ) {
            return response([
                'status' => false,
                'error' => 'Credentials is wrong',
                'validation_error' => $validator['error']
            ], 412);
        }

        try {
            $property->save();
        } catch (Exception $e) {

            if( (int) $e->getCode() === 23000 ) {

                return response([
                    'status' => false,
                    'error' => 'Repeat property title, please find him'
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

        return response([
            'status' => true,
            'data' => $property
        ], 201);
    }

}
