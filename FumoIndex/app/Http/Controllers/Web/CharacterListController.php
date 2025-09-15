<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Character;
use App\Models\Franchise;

class CharacterListController extends Controller
{
    public function index(Request $request)
    {
        $franchises = Franchise::all();
        $selectedFranchise = null;
        $characters = null;

        $franchiseSlug = $request->query('franchise');
        if ($franchiseSlug) {
            $selectedFranchise = Franchise::where('slug_name', $franchiseSlug)->first();
            if ($selectedFranchise) {
                $characters = Character::where('franchise_id', $selectedFranchise->id)
                    ->paginate(20);
            }
        }

        return view('character_list', compact('franchises', 'selectedFranchise', 'characters'));
    }
}
