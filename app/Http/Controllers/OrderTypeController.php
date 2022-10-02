<?php

namespace App\Http\Controllers;

use App\Models\OrderType;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderTypeController extends Controller
{

    /**
     * Getting data from
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response
    {
        $orderTypes = OrderType::where('id', '>=', 1)->get();

        return response([
            'status' => true,
            'data' => $orderTypes
        ]);
    }

    /**
     * Getting single order type
     *
     * @param Request $request
     * @return Response
     */
    public function single(Request $request): Response
    {
        $code = (string) $request->input('code');

        $orderTypeDB = OrderType::orderByDesc('id');

        if( mb_strlen($code) >= 1 ) {
            $orderTypeDB->where('code', '=', $code);
        }

        $orderType = $orderTypeDB->first();

        return response([
            'status' => true,
            'data' => $orderType
        ]);
    }

}
