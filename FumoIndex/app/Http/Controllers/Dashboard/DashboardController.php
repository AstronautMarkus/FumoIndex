<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Fumo;
use App\Models\FumoType;
use App\Models\Franchise;
use App\Models\Character;


class DashboardController extends Controller
{
public function index()
    {
        $user = Auth()->user();

        if ($user->is_admin) {

            $users = User::get();
            $fumos = Fumo::get();
            $fumo_types = FumoType::get();
            $franchises = Franchise::get();
            $characters = Character::get();
            $touhouFranchise = Franchise::where('franchise_name', 'Touhou Project')->first();

            $random_character = null;
            $random_franchise = null;
            $random_fumo_type = null;
            $random_fumo = null;
            
            if ($touhouFranchise) {
                $random_character = Character::inRandomOrder()->where('franchise_id', $touhouFranchise->id)->first();
            }

            if ($franchises->count() > 0) {
                $random_franchise = $franchises->random();
            }

            if ($fumo_types->count() > 0) {
                $random_fumo_type = $fumo_types->random();
            }

            return view('dashboard.admin', compact('users', 'fumos', 'fumo_types', 'franchises', 'characters', 'random_character', 'random_franchise', 'random_fumo_type', 'random_fumo'));
        } else {
            return view('dashboard.user');
        }
    }
}
