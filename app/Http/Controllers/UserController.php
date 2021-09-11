<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redis;

class UserController extends Controller
{

    /**
     * @param Request $request
     * @return Application|ResponseFactory|Response
     */
    public function index(Request $request)
    {

        $token = $request->header('Client-Token');

        $tmpUser = Redis::get("user:auth:{$token}");

        return response([
            'data' => json_decode($tmpUser)
        ]);
    }

}
