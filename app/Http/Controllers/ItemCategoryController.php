<?php

namespace App\Http\Controllers;

use App\Http\Helpers\MainHelper;
use App\Models\CardCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ItemCategoryController extends Controller
{

    /**
     * Search categories
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response
    {
        $search = (string) $request->input('search');
        $typeId = (int) $request->input('type_id');

        $res = CardCategory::where([
            ['name', 'like', "%{$search}%"]
        ])->orderByDesc('id');

        if( $typeId >= 1 ) {
            $res->where('type_id', $typeId);
        }

        $categories = $res->get();

        return response([
            'status' => true,
            'data' => $categories
        ]);
    }

    /**
     * Create item category
     *
     * @param Request $request
     * @return Response
     */
    public function create(Request $request): Response
    {
        $arFields = [
            'type_id' => (int) $request->input('type_id'),
            'name' => (string) $request->input('name'),
            'code' => '',
            'description' => (string) $request->input('description')
        ];

        $category = new CardCategory($arFields);
        $validator = $category->validate($arFields);

        if( $validator['status'] === false ) {
            return response([
                'status' => false,
                'error' => 'Not valid credintails',
                'errors' => $validator['errors']
            ], 412);
        }

        if( !MainHelper::isAdminOrModer() ) {
            return response([
                'status' => false,
                'error' => 'Permission denied'
            ], 401);
        }

        $recentCategories = CardCategory::where([
            ['type_id', '=', $arFields['type_id']],
            ['name', '=', $arFields['name']]
        ])->get();

        if( !$recentCategories->isEmpty() ) {
            return response([
                'status' => false,
                'error' => 'Category with that name has found in database'
            ], 410);
        }

        try {
            $category->save();
        } catch (Exception $e) {
            return response([
                'status' => false,
                'errors' => [
                    'Error with database',
                    $e->getMessage()
                ]
            ], 500);
        }

        return response([
            'status' => true,
            'data' => $category
        ]);
    }

}
