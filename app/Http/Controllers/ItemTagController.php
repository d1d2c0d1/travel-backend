<?php

namespace App\Http\Controllers;

use App\Http\Helpers\MainHelper;
use App\Models\ItemTag;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ItemTagController extends Controller
{

    /**
     * Search tags
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response
    {
        $search = (string) $request->input('search');

        $res = ItemTag::where([
            ['title', 'like', "%{$search}%"]
        ])->orderByDesc('id')->limit(5);

        $tags = $res->get();

        return response([
            'status' => true,
            'data' => $tags
        ]);
    }

    /**
     * Create tag
     *
     * @param Request $request
     * @return Response
     */
    public function create(Request $request): Response
    {
        $arFields = [
            'title' => $request->input('title'),
            'user_id' => MainHelper::getUserId()
        ];

        if( !MainHelper::isAdminOrModer() ) {
            return response([
                'status' => false,
                'error' => 'Permission denied'
            ], 401);
        }

        $tag = new ItemTag($arFields);
        $validator = $tag->validate($arFields);

        if( $validator['status'] === false ) {
            return response([
                'status' => false,
                'error' => 'Validation. Credintails is wrong',
                'validation_error' => $validator['error']
            ], 412);
        }

        try {
            $tag->save();
        } catch (Exception $e) {

            if( (int) $e->getCode() === 23000 ) {

                return response([
                    'status' => false,
                    'error' => 'Repeat tag title, please find him'
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
            'data' => $tag
        ], 201);
    }

}
