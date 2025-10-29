<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FumoType;

class FumoTypeController extends Controller
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

    public function show($slug_name)
    {
        $fumoType = FumoType::where('slug_name', $slug_name)->firstOrFail();
        return view('show.fumo_type', [
            'fumoType' => $fumoType
        ]);
    }
}
