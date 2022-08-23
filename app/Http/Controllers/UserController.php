<?php

namespace App\Http\Controllers;

use App\Http\Helpers\MainHelper;
use App\Models\Company;
use App\Models\Role;
use App\Models\User;
use App\Models\UserType;
use Cache;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
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

            $cacheKey = 'user-' . $tmpUser?->id;

            $user = User::find($tmpUser?->id);

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
        if( !MainHelper::isAdminOrModer() && $id !== MainHelper::getUserId() ) {
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

        /**
         * Editing data
         */

        if( $request->has('name') && !empty($request->input('name')) ) {
            $user->name = (string) $request->input('name');
        }

        if( $request->has('photo') && !empty($request->input('photo')) ) {
            $user->photo = (string) $request->input('photo');
        }

        if( $request->has('email') && !empty($request->input('email')) ) {
            $user->email = (string) $request->input('email');
        }

        $phone = (string) $request->input('phone');
        if( mb_strlen($phone) >= 2 ) {
            $user->phone = (int) preg_replace( '/\D/', '', $phone);
        }

        if( $request->has('password') && !empty($request->input('password')) ) {
            $user->password = Hash::make($request->input('email'));
        }

        // Change roles
        if( $request->has('role_id') && (int) $request->input('role_id') >= 1 ) {

            // Only admins can edit user role
            if( !MainHelper::isAdminOrModer() ) {
                return response([
                    'status' => false,
                    'error' => 'Permission denied. Only administrators can update user role'
                ], 401);
            }

            $user->role_id = (int) $request->input('role_id');
        }

        // Set user type
        if( $request->has('type_id') ) {
            $typeId = (int) $request->input('type_id');

            if( $typeId >= 1 ) {
                $type = UserType::find($typeId);

                // if find User Type
                if( $type && $type?->id === $typeId ) {
                    $user->type_id = $type->id;
                }
            }
        }

        // Set user company
        if( $request->has('company_id') ) {
            $companyId = (int) $request->input('company_id');

            if( $companyId >= 1 ) {
                $company = Company::find($companyId);

                // if find User Type
                if( $company && $company?->id === $companyId ) {
                    $user->company_id = $company->id;
                }
            }
        }

        // Try to save it
        try {
            $user->save();
        } catch (Exception $e) {
            return response([
                'status' => false,
                'error' => 'Error with request in database',
                'dbError' => (MainHelper::isAdmin() ? $e->getMessage() : '...')
            ], 500);
        }

        return response([
            'status' => true,
            'user' => $user
        ]);
    }

    /**
     * Getting guides
     *
     * @param Request $request
     * @return Response
     */
    public function guides(Request $request): Response
    {
        // Getting from request count rows per page
        $perPage = (int) $request->input('per_page');

        // Set default value for count rows of per page
        if( $perPage <= 0 ) {
            $perPage = 15;
        }

        // Find guide role
        $guideRole = Role::where([
            ['is_guide', '=', 1],
            ['is_admin', '=', 0],
            ['is_moder', '=', 0]
        ])->first();

        if( !$guideRole || !$guideRole?->id ) {
            return response([
                'status' => false,
                'error' => 'Guides role not found'
            ], 405);
        }

        // Getting guides from users table
        $guides = User::where('role_id', $guideRole->id)->with('role')->with('type')->paginate($perPage);

        // Sending 404 error if hasn't defined rows with guides role
        if( !$guides || !$guides->isEmpty() ) {
            return response([
                'status' => false,
                'error' => "Users with role \"$guideRole->name ($guideRole->id)\" is not defined"
            ], 404);
        }

        return response([
            'status' => true,
            'data' => $guides
        ]);
    }

}
