<?php

namespace App\Http\Controllers\FumoTypes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FumoType;


class FumoTypesController extends Controller
{
    public function getFumoTypesList()
    {
        $fumoTypes = FumoType::all();

        $result = [];
        foreach ($fumoTypes as $fumoType) {
            $result[] = [
                'id' => $fumoType->id,
                'fumo_type' => $fumoType->fumo_type,
                'type_description' => $fumoType->type_description
            ];
        }

        return response()->json($result);
    }
}
