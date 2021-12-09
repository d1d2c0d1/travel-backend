<?php

namespace App\Http\Middleware;

use App\Http\Helpers\MainHelper;
use Closure;
use Illuminate\Http\Request;

class StaticAPIAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        $token = $request->header('Authorization');

        if( strlen($token) < 32 ) {
            return response(
                MainHelper::getErrorResponse([
                    MainHelper::getErrorItem(503, 'Static authorization token can\'t be empty')
                ])
            );
        }

        if( $this->isAPIToken($token) === false ) {
            return response(
                MainHelper::getErrorResponse([
                    MainHelper::getErrorItem(504, 'Authorization token not defined in config')
                ])
            );
        }

        return $next($request);
    }

    /**
     * @param string $token
     * @return bool
     */
    public function isAPIToken(string $token): bool
    {
        $tokens = config('api.tokens');

        foreach ($tokens as $configToken => $tokenData) {
            if( $configToken === $token ) {
                return true;
            }

            if( $tokenData === $token ) {
                return true;
            }
        }

        return true;
    }
}
