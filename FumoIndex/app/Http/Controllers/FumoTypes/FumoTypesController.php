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
    
        $primaryTypes = [];
        $secondaryTypes = [];
    
        foreach ($fumoTypes as $fumoType) {
            $typeData = [
                'id' => $fumoType->id,
                'fumo_type' => $fumoType->fumo_type,
                'type_description' => $fumoType->type_description,
                'image_url' => asset('images/fumo_types/' . $fumoType->type_image)
            ];
    
            if ($fumoType->is_primary) {
                $primaryTypes[] = $typeData;
            } else {
                $secondaryTypes[] = $typeData;
            }
        }
    
        return response()->json([
            'primary_types' => $primaryTypes,
            'secondary_types' => $secondaryTypes
        ]);
    }

    public function getFumoTypeById($fumoTypeId)
    {
        $fumoType = FumoType::find($fumoTypeId);

        if ($fumoType) {
            return response()->json([
                'id' => $fumoType->id,
                'fumo_type' => $fumoType->fumo_type,
                'type_description' => $fumoType->type_description,
                'image_url' => asset('images/fumo_types/' . $fumoType->type_image)
            ]);
        } else {
            return response()->json([
                'error' => 'Fumo type not found'
            ], 404);
        }
    }
}
