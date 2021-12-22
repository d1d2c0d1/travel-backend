<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class PostsController extends Controller
{

    /**
     * Route for news
     *
     * @return array
     */
    public function news(): array
    {
        $result = [
            'status' => false,
            'error' => 'undefined',
            'data' => []
        ];

        $newsData = null;

        try {
            $newsData = json_decode(Redis::get('lastNews'), true);
        } catch ( Exception $e ) {
            $result['error'] = $e->getMessage();
        }

        if( $newsData && is_array($newsData) ) {
            $result['status'] = true;
            $result['data'] = $newsData;
            unset($result['error']);
        } else {
            if( $result['error'] === 'undefined' ) {
                $result['error'] = 'News is empty';
            }
        }

        return $result;
    }

}
