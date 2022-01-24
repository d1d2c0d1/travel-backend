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
     * Transliterate cyrilic to latin for URL
     *
     * @param string $originalText
     * @return string
     */
    public static function cyr2lat(string $originalText): string
    {
        $clearText = str_ireplace(' ', '-', trim($originalText));
        $clearText = preg_replace('/[^a-zA-Zа-яА-Я0-9-_]/ui', '', $clearText);

        $cyr = [
            'а','б','в','г','д','е','ё','ж','з','и','й','к','л','м','н','о','п',
            'р','с','т','у','ф','х','ц','ч','ш','щ','ъ','ы','ь','э','ю','я',
            'А','Б','В','Г','Д','Е','Ё','Ж','З','И','Й','К','Л','М','Н','О','П',
            'Р','С','Т','У','Ф','Х','Ц','Ч','Ш','Щ','Ъ','Ы','Ь','Э','Ю','Я'
        ];

        $lat = [
            'a','b','v','g','d','e','io','zh','z','i','y','k','l','m','n','o','p',
            'r','s','t','u','f','h','ts','ch','sh','sht','a','i','y','e','yu','ya',
            'A','B','V','G','D','E','Io','Zh','Z','I','Y','K','L','M','N','O','P',
            'R','S','T','U','F','H','Ts','Ch','Sh','Sht','A','I','Y','e','Yu','Ya'
        ];

        return strtolower(str_replace($cyr, $lat, $clearText));
    }

    /**
     * Prepare unit case by number
     *
     * @param int $n
     * @param array $titles
     * @return string
     */
    public static function getUnitCase(int $n, array $titles): string
    {
        $cases = array(2, 0, 1, 1, 1, 2);
        return $titles[($n % 100 > 4 && $n % 100 < 20) ? 2 : $cases[min($n % 10, 5)]];
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
