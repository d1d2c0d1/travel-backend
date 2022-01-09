<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\Redis;

class AdditionalController extends Controller
{

    public function weather(): array
    {
        $result = [];

        $weather = null;

        try {
            $weather = json_decode(Redis::get('weather'));
        } catch( Exception $e ) {
            return [
                'status' => false,
                'error' => 'Cant getting data from db'
            ];
        }

        $result['status'] = true;
        $result['data'] = [
            'temp' => [
                'c' => $weather->temp_c,
                'f' => $weather->temp_f
            ],
            'wind' => [
                'speed' => $weather->wind_kph,
                'direction' => $weather->wind_dir,
                'degree' => $weather->wind_degree
            ],
            'humidity' => $weather->humidity,
            'cloud' => $weather->cloud,
            'uv' => $weather->uv,
        ];

        return $result;
    }

}
