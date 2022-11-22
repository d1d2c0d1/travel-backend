<?php

namespace App\Http\Controllers;

use App\Models\SiteOption;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

class SiteOptionController extends Controller
{
    public function index(Request $request): Response
    {
        $options = Cache::remember("site_option_all", SiteOption::TIME_CACHE, function () {
            return SiteOption::all();
        });

        return response([
            'status' => true,
            'data' => $options,
        ]);
    }

    public function singleId($id, Request $request): Response
    {
        $option = Cache::remember("site_option_id/{$id}", SiteOption::TIME_CACHE, function () use ($id) {
            return SiteOption::find($id);
        });

        if ($option?->id !== $id) {
            return response([
                'status' => false,
                'error' => "SiteOption with ID:{$id} not found!"
            ], 404);
        }

        return response([
            'status' => true,
            'data' => $option
        ]);
    }

    public function singleCode($code, Request $request): Response
    {

        $option = Cache::remember("site_option_code/{$code}", SiteOption::TIME_CACHE, function () use ($code) {
            return SiteOption::where('code', 'LIKE', $code)->first();
        });

        if ($option?->code !== $code) {
            return response([
                'status' => false,
                'error' => "SiteOption with code:{$code} not found!"
            ], 404);
        }

        return response([
            'status' => true,
            'data ' => $option
        ]);
    }
}
