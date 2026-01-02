<?php

namespace App\Http\Controllers\Utils;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Franchise;

class CharacterAndFranchisesController extends Controller
{
    public function franchises()
    {
        $franchises = Franchise::orderBy('franchise_name')->get(['id', 'franchise_name', 'slug_name']);
        return response()->json($franchises);
    }

    public function characters($franchise_slug)
    {
        $franchise = Franchise::where('slug_name', $franchise_slug)->firstOrFail();
        $characters = $franchise->characters()->orderBy('character_name')->get(['id', 'character_name', 'slug_name']);
        return response()->json($characters);
    }
}
