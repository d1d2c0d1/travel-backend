<?php

namespace App\Http\Middleware;

use App\Http\Helpers\MainHelper;
use Closure;
use Illuminate\Http\Request;

class PaymentAuth
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
        $token = $request->input('secret_key');

        if( $token !== '78b2c87a85205d5cea91d5af4a475897' ) {
            return response(
                MainHelper::getErrorResponse([
                    MainHelper::getErrorItem(503, 'Payment authorization not accepted')
                ]), 403
            );
        }

        return $next($request);
    }
}
