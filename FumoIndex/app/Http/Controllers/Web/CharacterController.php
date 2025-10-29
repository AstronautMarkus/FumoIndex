<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Character;
use App\Models\Franchise;

class CharacterController extends Controller
{
    public function index(Request $request)
    {
        $franchises = Franchise::all()->map(function ($franchise) {
            $franchise->characters_count = Character::where('franchise_id', $franchise->id)->count();
            return $franchise;
        });
        $selectedFranchise = null;
        $characters = null;
        $characters_count = null;

        $franchiseSlug = $request->query('franchise');
        if ($franchiseSlug) {
            $selectedFranchise = Franchise::where('slug_name', $franchiseSlug)->first();
            if ($selectedFranchise) {
                $characters = Character::where('franchise_id', $selectedFranchise->id)
                    ->paginate(20);
                $characters_count = Character::where('franchise_id', $selectedFranchise->id)->count();
            }
        }

        return view('characters', compact('franchises', 'selectedFranchise', 'characters', 'characters_count'));
    }

    public function show($slug)
    {
        $character = Character::where('slug_name', $slug)->firstOrFail();
        $franchise = Franchise::find($character->franchise_id);

        return view('show.character', compact('character', 'franchise'));
    }
}
