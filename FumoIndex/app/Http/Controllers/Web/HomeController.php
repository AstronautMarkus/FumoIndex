<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FumoType;

class HomeController extends Controller
{
    public function index()
    {
        // IMPORTANT! Don't change names of this array without updating the seeder and the JSON file.
        $allowed_types = [
            'Standard Type',
            'Nendoroid Type',
            'Plush Strap Type',
            'Mannaka (Medium) Type',
            'Deka Type',
            'Puppet Type',
        ];

        $categories = FumoType::whereIn('fumo_type', $allowed_types)->get();
        return view('home', compact('categories'));
    }
}
