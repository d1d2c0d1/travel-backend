<?php

namespace App\Http\Controllers;

use App\Http\Helpers\MainHelper;
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
    public function create(Request $request): Response
    {
        $email = $request->json('email');
        $password = $request->json('password');

        if( empty($email) || empty($password) ) {
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

        if( Hash::check($user->password, $password) ) {
            return response(
                MainHelper::getErrorResponse([
                    MainHelper::getErrorItem(404, 'Email or password incorrected', [
                        'user' => $user
                    ])
                ]),
                404
            );
        }

        $token = $user->generateToken();
        Redis::set("user:auth:{$token}", json_encode($user->toArray()));

        return response(
            MainHelper::getResponse(true, [
                'token' => $token
            ])
        );
    }

    /**
     * Registration account
     *
     * @param Request $request
     * @return Response
     */
    public function registration(Request $request): Response
    {
        $email = $request->json('email');
        $password = $request->json('password');

        if( empty($email) || empty($password) ) {
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

        $user = new User();

        $user->email = $email;
        $user->password = Hash::make($password);
        $user->role_id = 20;

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
                'token' => $token
            ])
        );
    }
}
