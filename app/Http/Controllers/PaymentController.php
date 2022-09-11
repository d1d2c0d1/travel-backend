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

}
