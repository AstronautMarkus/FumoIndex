<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Character;
use App\Models\Franchise;

class CharacterListController extends Controller
{
    public function index()
    {
        $characters = Character::all();
        $franchises = Franchise::all();
        return view('character_list', compact('characters', 'franchises'));
    }
}
