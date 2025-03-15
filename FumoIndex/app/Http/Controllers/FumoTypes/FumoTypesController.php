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
                'type_description' => $fumoType->type_description,
                'image_url' => asset('images/fumo_types/' . $fumoType->type_image)
            ];
        }
    
        return response()->json($result);
    }    

    public function getFumoTypeById($fumoTypeId)
    {
        $fumoType = FumoType::find($fumoTypeId);

        if ($fumoType) {
            return response()->json([
                'id' => $fumoType->id,
                'fumo_type' => $fumoType->fumo_type,
                'type_description' => $fumoType->type_description
            ]);
        } else {
            return response()->json([
                'error' => 'Fumo type not found'
            ], 404);
        }
    }
}
