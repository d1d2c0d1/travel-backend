<?php

namespace App\Http\Controllers;

use App\Http\Helpers\MainHelper;
use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;

class AuthorizationController extends Controller
{

    /**
     * Authenticate method
     *
     * @param Request $request
     * @return Response
     */
    public function auth(Request $request): Response
    {
        $email = (string) $request->json('email');
        $password = (string) $request->json('password');

        if( mb_strlen($email) <= 8 || mb_strlen($password) <= 6 || !str_contains($email, '@')) {
            return response(
                MainHelper::getErrorResponse([
                    MainHelper::getErrorItem(403, 'Empty login or password fields')
                ]),
                403
            );
        }

        // Getting data for user by email
        $users = User::where([
            ['email', '=', $email]
        ])->get();

        if( $users->isEmpty() ) {
            return response(
                MainHelper::getErrorResponse([
                    MainHelper::getErrorItem(406, 'Email not defined in our database')
                ]),
                406
            );
        }

        /** @var User $user */
        $user = $users[0];

        if( !Hash::check($password, $user->password) ) {
            return response(
                MainHelper::getErrorResponse([
                    MainHelper::getErrorItem(409, 'Email or password incorrected')
                ]),
                409
            );
        }

        $token = $user->generateToken();
        Redis::set("user:auth:{$token}", json_encode($user->toArray()));

        return response(
            MainHelper::getResponse(true, [
                'token' => $token,
                'roleId' => $user->role_id
            ])
        );
    }

    /**
     * Route for Authorize users in WebSockets
     *
     * @param Request $request
     * @return Response
     */
    public function broadcastingAuthorize(Request $request): Response
    {

        $token = (string) $request->input('token');
        $socketId = $request->input('socket_id');
        $channelName = $request->input('channel_name');

        try {
            $data = json_decode(Redis::get("user:auth:{$token}"));
        } catch (Exception $e) {
            return response([
                'status' => false,
                'error' => 'User token not found!',
                'exception' => [
                    'error' => $e->getMessage()
                ]
            ], 403);
        }

        $user = User::find($data?->id);

        return response([
            'status' => true,
            'user' => $user
        ]);
    }

    /**
     * Registration account
     *
     * @param Request $request
     * @return Response
     */
    public function registration(Request $request): Response
    {
        $email = (string) $request->json('email');
        $password = (string) $request->json('password');

        if( mb_strlen($email) <= 8 || mb_strlen($password) <= 6 || !str_contains($email, '@')) {
            return response(
                MainHelper::getErrorResponse([
                    MainHelper::getErrorItem(403, 'Empty login or password fields')
                ]),
                403
            );
        }

        // Getting data for user by email
        $users = User::where([
            ['email', '=', $email]
        ])->get();

        if( !$users->isEmpty() ) {
            return response(
                MainHelper::getErrorResponse([
                    MainHelper::getErrorItem(405, 'User with this email has in service')
                ]),
                405
            );
        }

        $roles = Role::where([
            ['is_default', '=', 1]
        ])->get();

        $defaultRole = 0;
        if( !$roles->isEmpty() ) {
            $defaultRole = (int) $roles[0]->id;
        }

        $user = new User();

        $user->email = $email;
        $user->password = Hash::make($password);
        $user->role_id = $defaultRole;
        $user->name = explode('@', $email)[0];
        $user->country_id = 1; // Российская Федерация
        $user->region_id = 77; // Москва и МО
        $user->city_id = 50; // Москва

        try {

            // Save user
            $user->save();

        } catch (Exception $e) {
            return response(
                MainHelper::getErrorResponse([
                    MainHelper::getErrorItem(401, 'User can\'t be created'),
                    MainHelper::getErrorItem(500, $e->getMessage())
                ]),
                500
            );
        }

        // Generate auth token
        $token = $user->generateToken();
        Redis::set("user:auth:{$token}", json_encode($user->toArray()));

        return response(
            MainHelper::getResponse(true, [
                'token' => $token,
                'roleId' => $user->role_id
            ])
        );
    }
}
