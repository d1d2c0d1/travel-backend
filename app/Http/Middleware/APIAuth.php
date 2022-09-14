<?php

namespace App\Http\Middleware;

use App\Http\Helpers\MainHelper;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class APIAuth
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        $token = $request->header('Client-Token');

        if( strlen($token) <= 32 ) {
            return response(
                MainHelper::getErrorResponse([
                    MainHelper::getErrorItem(403, 'Client authorization token can\'t be empty')
                ])
            );
        }

        $userId = (int) Redis::get("user:auth:{$token}");

        if( $userId <= 0 ) {
            return response([
                'status' => false,
                'error' => 'You are not authorization!'
            ], 403);
        }

        if( MainHelper::getUserId() <= 0 ) {
            return response(
                MainHelper::getErrorResponse([
                    MainHelper::getErrorItem(503, 'User not defined. Authorization is failed!')
                ]), 403
            );
        }

        return $next($request);
    }
}
