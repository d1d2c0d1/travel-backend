<?php

namespace App\Http\Middleware;

use App\Http\Helpers\MainHelper;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ModerRoute
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next): Response|RedirectResponse
    {

        if( !MainHelper::isAdminOrModer() ) {
            return response([
                'status' => false,
                'error' => 'Permission denied'
            ], 401);
        }

        return $next($request);
    }
}
