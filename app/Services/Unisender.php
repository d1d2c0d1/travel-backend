<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class Unisender
{

    const API_KEY = '6cm8geu7m8mx9p4skimy39yi3e7wk37eydben4aa';
    const API_BASE_URL = 'https://api.unisender.com/';
    const API_LANG = 'ru';

    public function sendEmail(array $arFields = []): array
    {
        $url = self::API_BASE_URL . self::API_LANG . '/api/' . 'sendEmail';
        $data = [
            'api_key' => self::API_KEY,
            'format' => 'json',
            'sender_name' => 'U-Gid',
            'sender_email' => 'info@u-gid.com',
            'lang' => 'ru',
            'list_id' => 353,
            'email' => $arFields['email'],
            'subject' => $arFields['subject'],
            'body' => $arFields['body']
        ];

        $response = Http::asForm()->post($url, $data);

        if( $response->successful() ) {
            return [
                'status' => true,
                'url' => $url,
                'data' => $data,
                'response' => $response->throw()->json()
            ];
        } else {
            return [
                'status' => false,
                'url' => $url,
                'data' => $data,
                'error' => $response->serverError()
            ];
        }
    }
}
