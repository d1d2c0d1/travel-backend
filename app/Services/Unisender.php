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
        $response = Http::post(self::API_BASE_URL . self::API_LANG . '/' . 'sendEmail', [
            'api_key' => self::API_KEY,
            'email' => $arFields
        ]);
    }
}
