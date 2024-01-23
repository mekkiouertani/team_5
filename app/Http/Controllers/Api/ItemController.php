<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();

        return response()->json([
            'success' => true,
            'results' => $items,
        ]);
    }

    public function show($slug)
    {
        $item = Item::where('slug', $slug)->first();
        return response()->json([
            'success' => true,
            'results' => $item,
        ]);
    }
}
