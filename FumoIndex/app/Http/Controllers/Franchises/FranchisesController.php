<?php

namespace App\Http\Controllers\Franchises;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Franchise;

class FranchisesController extends Controller
{
    public function getFranchises(Request $request)
    {
        $franchises = Franchise::all()->map(function ($franchise) {
            return [
                'id' => $franchise->id,
                'franchise_name' => $franchise->franchise_name,
                'slug_name' => $franchise->slug_name,
                'franchise_image' => url('/assets/franchises/' . $franchise->franchise_image),
            ];
        });

        return response()->json($franchises);
    }
}
