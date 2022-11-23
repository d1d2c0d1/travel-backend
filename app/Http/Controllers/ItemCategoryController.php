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
        $id = (int) $request->input('id');

        $res = CardCategory::orderByDesc('id');

        if( mb_strlen($search) >= 1 ) {
            $res->where([
                ['name', 'like', "%{$search}%"]
            ]);
        }

        if( $typeId >= 1 ) {
            $res->where('type_id', $typeId);
        }

        if( $id >= 1 ) {
            $res->where('id', '=', $id);
        }

        $categories = $res->with('author')->get();

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
        $validate = MainHelper::validate($request, CardCategory::CREATING_RULES);
        if ($validate->getStatus() === false) {
            return response($validate->toArray(), 412);
        }
        $arFields = [
            'author_id' => MainHelper::getUserId(),
            'type_id' => (int) $request->input('type_id'),
            'name' => (string) $request->input('name'),
            'code' => MainHelper::cyr2lat((string) $request->input('name')),
            'description' => (string) $request->input('description'),
            'seo_title' => (string) $request->input('seo_title'),
            'seo_description' => (string) $request->input('seo_description'),
        ];

        $category = new CardCategory($arFields);

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

    /**
     * Update data in category
     *
     * @param int $id
     * @param Request $request
     * @return Response
     */
    public function update(int $id, Request $request): Response
    {
        if( $id <= 0 ) {
            return response([
                'status' => false,
                'error' => 'ID can\'t be empty'
            ], 401);
        }

        $category = CardCategory::find($id);

        if( !$category || !$category?->id ) {
            return response([
                'status' => false,
                'error' => 'Card category not found'
            ], 404);
        }

        $validate = MainHelper::validate($request, CardCategory::UPDATING_RULES);
        if ($validate->getStatus() === false) {
            return response($validate->toArray(), 412);
        }

        foreach ($validate->getData() as $key=>$value) {
            $category->$key = $value;
        }

        try {
            $category->save();
        } catch (Exception $e) {
            return response([
                'status' => false,
                'error' => 'Database error',
                'database_error' => $e->getMessage()
            ], 500);
        }

        return response([
            'status' => true,
            'data' => $category
        ]);
    }

    /**
     * Remove category
     *
     * @param int $id
     * @return Response
     */
    public function delete(int $id): Response
    {
        if( $id <= 0 ) {
            return response([
                'status' => false,
                'error' => 'ID can\'t be empty'
            ], 401);
        }

        $category = CardCategory::find($id);

        if( !$category || !$category?->id ) {
            return response([
                'status' => false,
                'error' => 'Card category not found'
            ], 404);
        }

        $category->delete();

        return response([
            'status' => true,
            'data' => $category
        ]);
    }

}
