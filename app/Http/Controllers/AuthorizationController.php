<?php

namespace App\Http\Controllers;

use App\Http\Helpers\MainHelper;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redis;

class AuthorizationController extends Controller
{
    /**
     * Authenticate method
     *
     * @param Request $request
     * @return Response
     */
    public function create(Request $request): Response
    {
        $login = $request->json('login');
        $password = $request->json('password');

        $users = User::where([
            ['email', '=', $login]
        ])->get();

        if( $users->isEmpty() ) {
            return response(
                MainHelper::getErrorResponse([
                    MainHelper::getErrorItem(404, 'Email not defined in our database')
                ])
            );
        }

        $user = $users[0];

        if( $user->password !== $password ) {
            return response(
                MainHelper::getErrorResponse([
                    MainHelper::getErrorItem(404, 'Email or password incorrected')
                ])
            );
        }

        $token = md5( implode(':', $user->toArray()) . date('Y-m-d H:i:s') . rand(100, 500000));

        Redis::set("user:auth:{$token}", json_encode($user->toArray()));

        return response(
            MainHelper::getResponse(true, [
                'user' => $user,
                'token' => $token
            ])
        );
    }
}
