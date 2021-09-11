<?php

namespace App\Http\Helpers;

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
     * @return array
     */
    public static function getErrorItem(int $errorCode = 404, string $errorMessage = 'Undefined error'): array
    {
        return [
            'message' => $errorMessage,
            'code' => $errorCode
        ];
    }
}
