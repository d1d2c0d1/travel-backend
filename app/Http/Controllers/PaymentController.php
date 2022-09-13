<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PaymentController extends Controller
{

    /**
     * Payment check
     *
     * @param Request $request
     * @return Response
     */
    public function check(Request $request): Response
    {

        return response([
            'code' => 0
        ]);
    }

    /**
     * Payment accepted
     *
     * @param Request $request
     * @return Response
     */
    public function pay(Request $request): Response
    {

        return response([
            'code' => 0
        ]);
    }

    /**
     * Payment failed
     *
     * @param Request $request
     * @return Response
     */
    public function fail(Request $request): Response
    {

        return response([
            'code' => 0
        ]);
    }

    /**
     * Payment confirmed
     *
     * @param Request $request
     * @return Response
     */
    public function confirm(Request $request): Response
    {

        return response([
            'code' => 0
        ]);
    }

    /**
     * Payment refunded
     *
     * @param Request $request
     * @return Response
     */
    public function refund(Request $request): Response
    {

        return response([
            'code' => 0
        ]);
    }

}
