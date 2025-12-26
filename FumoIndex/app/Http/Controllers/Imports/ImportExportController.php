<?php

namespace App\Http\Controllers\Imports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Character;
use App\Models\Franchise;

class ImportExportController extends Controller
{
    public function importExportView()
    {
        return view('dashboard.import_export');
    }

    public function importView($type)
    {
        return view('dashboard.import_export.import', ['type' => $type]);
    }

    public function exportView($type)
    {
        return view('dashboard.import_export.export', ['type' => $type]);
    }

    public function exportData($type)
    {
        if ($type === 'characters') {
            $characters = Character::with('franchise')->get()->map(function ($character) {
                return [
                    'name' => $character->character_name,
                    'franchise_slug' => $character->franchise->slug_name ?? null,
                    'description' => $character->character_description,
                    'description_source' => $character->description_source,
                    'character_image' => $character->character_image,
                ];
            });

            $json = $characters->toJson(JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

            return response($json, 200, [
                'Content-Type' => 'application/json',
                'Content-Disposition' => 'attachment; filename="characters.json"',
            ]);
        }

        abort(404);
    }
}
