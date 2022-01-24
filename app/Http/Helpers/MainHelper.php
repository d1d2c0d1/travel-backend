<?php

namespace App\Http\Helpers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Redis;

class MainHelper
{

    /**
     * Возвращает массив подготовленный для ответа сервера
     *
     * @param bool $status
     * @param array|null $additionalData
     * @param array|null $errors
     * @return array
     */
    public static function getResponse(bool $status = false, array $additionalData = null, array $errors = null): array
    {
        $response = [
            'status' => $status
        ];

        if( $additionalData && is_array($additionalData) && !empty($additionalData) ) {
            $response['data'] = $additionalData;
        }

        if( !empty($errors) && is_array($errors) ) {
            $response['errors'] = $errors;
        }

        if( empty($errors) && $status === false ) {
            $response['errors'] = [
                [
                    'message' => 'Undefined error',
                    'code' => 404
                ]
            ];
        }

        return $response;
    }

    /**
     * Возвращает ответ об ошибке
     *
     * @param array $errors
     * @return bool[]
     */
    public static function getErrorResponse(array $errors = []): array
    {
        return self::getResponse(false, null, $errors);
    }

    /**
     * Возвращает строку для построения ошибок
     *
     * @param int $errorCode
     * @param string $errorMessage
     * @param array $data
     * @return array
     */
    public static function getErrorItem(int $errorCode = 404, string $errorMessage = 'Undefined error', array $data = []): array
    {
        $result = [
            'message' => $errorMessage,
            'code' => $errorCode,
        ];

        if( !empty($data) ) {
            $result['data'] = $data;
        }

        return $result;
    }

    /**
     * Getting current auth user data
     *
     * @return User|false
     */
    public static function getUser(): User | false {

        $token = (string) app('request')->header('Client-Token', '');

        if( strlen($token) <= 32 ) {
            return false;
        }

        global $userData;

        if( $userData instanceof User ) {
            return $userData;
        }

        $user = Redis::get("user:auth:{$token}");

        if( strlen($user) >= 32 && stristr($user, '{') ) {
            $user = json_decode($user);
        }

        if( !is_object($user) || (is_object($user) && !isset($user->id)) ) {
            return false;
        }

        $userData = User::find((int) $user->id);

        if( !$userData || !$userData?->id ) {
            unset($userData);
            return false;
        }

        return $userData;
    }

    /**
     * Get current user id
     *
     * @return int
     */
    public static function getUserId(): int {
        return (int) self::getUser()?->id;
    }

    /**
     * Get role id of current user
     *
     * @return int
     */
    public static function getUserRoleId(): int {
        return (int) self::getUser()?->role_id;
    }

    /**
     * Get role of current user
     *
     * @return Role|null
     */
    public static function getUserRole(): Role | null {
        return self::getUser()?->role;
    }

    /**
     * Is current user has moder rules
     *
     * @return bool
     */
    public static function isModer(): bool {
        return (bool) self::getUserRole()?->is_moder;
    }

    /**
     * Is current user has admin rules
     *
     * @return bool
     */
    public static function isAdmin(): bool {
        return (bool) self::getUserRole()?->is_admin;
    }

    /**
     * Is current user has moder or admin rules
     *
     * @return bool
     */
    public static function isAdminOrModer(): bool {
        return self::isModer() || self::isAdmin();
    }
}
