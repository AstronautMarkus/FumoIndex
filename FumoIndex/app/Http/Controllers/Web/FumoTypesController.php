<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FumoType;

class FumoTypesController extends Controller
{
    public function index()
    {
        $primaryFumoTypes = FumoType::where('is_primary', true)->get();
        $secondaryFumoTypes = FumoType::where('is_primary', false)->get();
        return view('fumo_types', [
            'primaryFumoTypes' => $primaryFumoTypes,
            'secondaryFumoTypes' => $secondaryFumoTypes
        ]);
    }
}
