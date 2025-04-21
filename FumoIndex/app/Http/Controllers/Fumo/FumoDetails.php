<?php

namespace App\Http\Controllers\Fumo;

use App\Http\Controllers\Controller;
use App\Models\Fumo;
use Illuminate\Http\Request;

class FumoDetails extends Controller
{
    public function getFumoDetails($fumoId)
    {
        $fumo = Fumo::with(['releases.event'])->find($fumoId);

        if (!$fumo) {
            return response()->json(['error' => 'Fumo not found'], 404);
        }

        return response()->json($fumo);
    }
}
