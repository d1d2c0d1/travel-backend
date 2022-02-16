<?php

namespace App\Http\Controllers;

use App\Http\Helpers\MainHelper;
use App\Models\User;
use Cache;
use Exception;
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
    public function index(Request $request): Response|Application|ResponseFactory
    {

        $token = $request->header('Client-Token');
        $tmpUser = Redis::get("user:auth:{$token}");

        try {
            $tmpUser = json_decode($tmpUser);
        } catch (Exception $e) {
            return response([
                'status' => false,
                'error' => 'User cant be decoded'
            ], 403);
        }

        if( $tmpUser?->id >= 1 ) {

            $user = Cache::remember('user-' . $tmpUser?->id, 86400, function () use ($tmpUser) {
                User::find($tmpUser?->id);
            });

            if (!$user) {
                return response([
                    'status' => false,
                    'error' => 'User with token:' . $token . ' not found',
                ], 404);
            }

            return response([
                'status' => true,
                'user' => $user
            ]);
        }

        return response([
            'status' => false,
            'error' => 'User id not found by sending token'
        ], 403);
    }

    /**
     * Getting list users
     *
     * @param Request $request
     * @return Response
     */
    public function filter(Request $request): Response
    {

        if( !MainHelper::isAdminOrModer() ) {
            return response([
                'status' => false,
                'error' => 'Permission denied'
            ], 401);
        }

        $usersDB = User::where([
            ['id', '>=', 1]
        ]);

        // TODO: Filter users

        $users = $usersDB->paginate();

        return response([
            'status' => true,
            'users' => $users
        ]);
    }

    /**
     * Getting data about user by id
     *
     * @param int $id
     * @return Response
     */
    public function single(int $id): Response
    {
        if( !MainHelper::isAdminOrModer() ) {
            return response([
                'status' => false,
                'error' => 'Permission denied'
            ], 401);
        }

        $user = User::find($id);

        if( !$user ) {
            return response([
                'status' => false,
                'error' => 'User with id: ' . $id . ' not found',
            ], 404);
        }

        return response([
            'status' => true,
            'user' => $user
        ]);
    }

    /**
     * Update user data
     *
     * @param int $id
     * @param Request $request
     * @return Response
     */
    public function update(int $id, Request $request): Response
    {
        if( !MainHelper::isAdminOrModer() ) {
            return response([
                'status' => false,
                'error' => 'Permission denied'
            ], 401);
        }

        $user = User::find($id);

        if( !$user && !$user?->id ) {
            return response([
                'status' => false,
                'error' => 'User with id:' . $id . ' not found'
            ], 404);
        }

        $request->input('')

        return response([
            'status' => true,
            'user' => ''
        ]);
    }

}
