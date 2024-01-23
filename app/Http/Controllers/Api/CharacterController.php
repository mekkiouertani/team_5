<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Character;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    public function index()
    {
        $characters = Character::paginate(3);
        return response()->json(
            [
                'success' => true,
                'results' => $characters
            ]
        );
    }

    public function show($id)
    {
        $character = Character::where('id', $id)->first();
        return response()->json(
            [
                'success' => true,
                'results' => $character
            ]
        );
    }
}
