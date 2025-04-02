<?php

namespace App\Http\Controllers\Characters;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Character;
use App\Models\Franchise;

class CharactersController extends Controller
{
    public function getCharactersList()
    {
        $characters = Character::with('franchise')->get()->groupBy('franchise.franchise_name');

        $result = [];
        foreach ($characters as $franchiseName => $chars) {
            $franchiseImage = $chars->first()->franchise->franchise_image ?? null;
            $result[] = [
                'franchise' => $franchiseName,
                'franchise_image' => env('IMAGE_CDN_URL') . '/' . $franchiseImage,
                'characters' => $chars->map(function ($char) {
                    return [
                        'id' => $char->id,
                        'character_name' => $char->character_name,
                        'character_image' => env('IMAGE_CDN_URL') . '/' . $char->character_image,
                    ];
                })->values()
            ];
        }

        return response()->json($result);
    }

    public function getCharactersByFranchise($franchiseId)
    {
        $franchise = Franchise::where('id', $franchiseId)->first();
        if (!$franchise) {
            return response()->json(['error' => 'Franchise not found'], 404);
        }

        $characters = Character::where('franchise_id', $franchise->id)->get()->map(function ($char) {
            return [
                'id' => $char->id,
                'character_name' => $char->character_name,
                'character_image' => env('IMAGE_CDN_URL') . '/' . $char->character_image,
            ];
        });

        return response()->json([
            'franchise' => $franchise->franchise_name,
            'franchise_image' => env('IMAGE_CDN_URL') . '/' . $franchise->franchise_image,
            'characters' => $characters
        ]);
    }
}
