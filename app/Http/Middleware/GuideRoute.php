<?php

namespace App\Http\Middleware;

use App\Http\Helpers\MainHelper;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GuideRoute
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(Request): (Response|RedirectResponse) $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next): Response|RedirectResponse
    {

        if( !MainHelper::isGuide() ) {
            return response([
                'status' => false,
                'error' => 'Permission denied'
            ], 401);
        }

        return $next($request);
    }
}
