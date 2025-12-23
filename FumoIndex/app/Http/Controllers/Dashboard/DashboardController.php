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
            $random_character = Character::inRandomOrder()->where('franchise_id', $touhouFranchise->id)->first();

            return view('dashboard.admin', compact('users', 'fumos', 'fumo_types', 'franchises', 'characters', 'random_character'));
        } else {
            return view('dashboard.user');
        }
    }
}
