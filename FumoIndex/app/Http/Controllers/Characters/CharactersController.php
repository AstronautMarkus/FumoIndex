<?php

namespace App\Http\Controllers\Characters;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Character;
use App\Models\Franchise;

class CharactersController extends Controller
{
    public function getCharactersByFranchise($franchiseId, Request $request)
    {
        $franchise = Franchise::where('id', $franchiseId)->first();
        if (!$franchise) {
            return response()->json(['error' => 'Franchise not found'], 404);
        }

        $perPage = $request->query('per_page', 10);
        $characters = Character::where('franchise_id', $franchise->id)
            ->paginate($perPage)
            ->through(function ($char) {
                return [
                    'id' => $char->id,
                    'character_name' => $char->character_name,
                    'character_image' => url('/assets/characters/' . $char->character_image),
                ];
            });

        return response()->json([
            'franchise' => $franchise->franchise_name,
            'franchise_image' => url('/assets/franchises/' . $franchise->franchise_image),
            'characters' => $characters
        ]);
    }
}
