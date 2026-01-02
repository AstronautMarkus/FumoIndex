<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fumo;
use App\Models\FumoType;
use App\Models\Character;

class FumoController extends Controller
{
    public function index()
    {
        $fumos = Fumo::with(['character', 'type'])->paginate(10);
        return view('fumos', compact('fumos'));
    }

    public function show($gift_code)
    {
        $fumo = Fumo::where('gift_code', $gift_code)->firstOrFail();

        // Collect unique franchises from fumo's characters
        $franchises = collect();
        foreach ($fumo->character as $character) {
            if ($character->franchise && !$franchises->contains('id', $character->franchise->id)) {
                $franchises->push($character->franchise);
            }
        }

        return view('show.fumo', compact('fumo', 'franchises'));
    }
}
