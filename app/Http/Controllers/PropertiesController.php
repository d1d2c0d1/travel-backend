<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PropertiesController extends Controller
{

    public function index(Request $request): Response
    {

        $search = (string) $request->input('search');

        $res = Property::where([
            ['title', 'like', "%{$search}%"]
        ])->orderByDesc('id')->limit(5);

        $tags = $res->get();

        return response([
            'status' => true,
            'data' => $tags
        ]);

    }

}
