<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FumoType;

class HomeController extends Controller
{
    public function index()
    {
        // Get only primary categories, evite hardcoding hehehe
        $categories = FumoType::where('is_primary', true)->get();
        return view('home', compact('categories'));
    }
}