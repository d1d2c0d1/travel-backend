<?php

namespace App\Http\Controllers;

use App\Models\ItemType;
use Illuminate\Http\Response;

class ItemTypeController extends Controller
{
    /**
     * Getting all item types
     *
     * @return Response
     */
    public function index(): Response
    {
        return response([
            'status' => true,
            'data' => ItemType::all()
        ], 200);
    }
}
