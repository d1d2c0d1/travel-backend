<?php

namespace App\Http\Controllers;

use App\Models\Subscribe;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return array
     */
    public function index(Request $request): array
    {

        $ip = (string) $request->json('ip');
        $email = (string) $request->json('email');

        $subscribe = new Subscribe([
            'ip' => $ip,
            'email' => $email,
        ]);

        $subscribe->save();

        return array(
            'ip' => $ip,
            'email' => $email,
        );

    }
}
