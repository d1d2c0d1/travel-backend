<?php

namespace App\Http\Controllers;

use App\Http\Helpers\MainHelper;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RolesController extends Controller
{
    /**
     * Getting list roles
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response
    {
        $roles = Role::select(['id','name', 'admin'])
        ->where([
            ['id', '>=', 1]
        ])->get();

        return response(
            MainHelper::getResponse(true, $roles->toArray())
        );
    }

}
