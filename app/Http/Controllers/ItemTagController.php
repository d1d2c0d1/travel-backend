<?php

namespace App\Http\Controllers;

use App\Http\Helpers\MainHelper;
use App\Models\CardTag;
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
        $search = (string)$request->input('япsearch');

        $res = CardTag::where([
            ['title', 'like', "%{$search}%"]
        ])->orderByDesc('id');

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
        $validate = MainHelper::validate($request, CardTag::CREATING_RULES);
        if ($validate->getStatus() === false) {
            return response($validate->toArray(), 412);
        }
        $arFields = [
            'title' => $request->input( 'title'),
            'user_id' => MainHelper::getUserId()
        ];

        $tag = new CardTag($arFields);

        try {
            $tag->save();
        } catch (Exception $e) {

            if ((int)$e->getCode() === 23000) {

                return response([
                    'status' => false,
                    'error' => 'Repeat tag title, please find him'
                ], 410);

            } else {
                return response([
                    'status' => false,
                    'error' => 'Error in database',
                    'dbError' => $e->getMessage(),
                    'dbErrorCode' => (int)$e->getCode()
                ], 500);
            }
        }

        return response([
            'status' => true,
            'data' => $tag
        ], 201);
    }

}
