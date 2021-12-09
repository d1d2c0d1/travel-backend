<?php

namespace App\Http\Middleware;

use App\Http\Helpers\MainHelper;
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
    public function handle(Request $request, Closure $next)
    {
        $token = $request->header('Client-Token');

        if( strlen($token) !== 32 ) {
            return response(
                MainHelper::getErrorResponse([
                    MainHelper::getErrorItem(503, 'Client authorization token can\'t be empty')
                ])
            );
        }

        $user = Redis::get("user:auth:{$token}");

        if( strlen($user) >= 32 && stristr($user, '{') ) {
            $user = json_decode($user);
        }

        if( !is_object($user) || (is_object($user) && !isset($user->id)) ) {
            return response(
                MainHelper::getErrorResponse([
                    MainHelper::getErrorItem(504, 'Client authorization token has not defined')
                ])
            );
        }

        return $next($request);
    }
}
