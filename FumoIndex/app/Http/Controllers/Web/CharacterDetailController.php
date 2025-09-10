<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Character;
use App\Models\Franchise;

class CharacterDetailController extends Controller
{
    public function show($slug)
    {
        $character = Character::where('slug_name', $slug)->firstOrFail();
        $franchise = Franchise::find($character->franchise_id);

        return view('character_detail', compact('character', 'franchise'));
    }
}
