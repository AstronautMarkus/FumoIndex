<?php

namespace App\Http\Controllers\Imports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
                    'slug_name' => $character->slug_name,
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
        elseif ($type === 'franchises') {
            $franchises = Franchise::all()->map(function ($franchise) {
                return [
                    'franchise_name' => $franchise->franchise_name,
                    'franchise_image' => $franchise->franchise_image,
                    'slug_name' => $franchise->slug_name,
                ];
            });

            $json = $franchises->toJson(JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

            return response($json, 200, [
                'Content-Type' => 'application/json',
                'Content-Disposition' => 'attachment; filename="franchises.json"',
            ]);
        }
        elseif ($type === 'fumo_types') {
            $fumoTypes = \App\Models\FumoType::all()->map(function ($fumoType) {
                return [
                    'fumo_type' => $fumoType->fumo_type,
                    'slug_name' => $fumoType->slug_name,
                    'type_description' => $fumoType->type_description,
                    'fumo_type_image' => $fumoType->fumo_type_image,
                    'is_primary' => (bool) $fumoType->is_primary,
                    'width' => $fumoType->width,
                    'height' => $fumoType->height,
                ];
            });

            $json = $fumoTypes->toJson(JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

            return response($json, 200, [
                'Content-Type' => 'application/json',
                'Content-Disposition' => 'attachment; filename="fumo_types.json"',
            ]);
        }

        abort(404);
    }

    public function importData(Request $request, $type)
    {
        $request->validate([
            'import_file' => 'required|file|mimes:json',
        ]);

        $file = $request->file('import_file');
        $data = json_decode(file_get_contents($file), true);

        $results = [
            'imported' => 0,
            'updated' => 0,
            'skipped' => 0,
            'skipped_items' => [],
        ];

        try {
            DB::beginTransaction();
            if ($type === 'characters') {
                foreach ($data as $item) {
                    // ...existing code for characters...
                    if (
                        !array_key_exists('description', $item) ||
                        (!is_null($item['description']) && !is_string($item['description'])) ||
                        !array_key_exists('description_source', $item) ||
                        (!is_null($item['description_source']) && !is_string($item['description_source']))
                    ) {
                        $results['skipped']++;
                        $results['skipped_items'][] = [
                            'name' => $item['name'] ?? '(no name)',
                            'reason' => 'description and description_source must be strings or null'
                        ];
                        continue;
                    }

                    $franchise = Franchise::where('slug_name', $item['franchise_slug'])->first();
                    if (!$franchise) {
                        $results['skipped']++;
                        $results['skipped_items'][] = [
                            'name' => $item['name'],
                            'reason' => 'Franchise not found: ' . $item['franchise_slug']
                        ];
                        continue;
                    }

                    $character = Character::where('character_name', $item['name'])->first();
                    if ($character) {
                        $character->update([
                            'slug_name' => $item['slug_name'],
                            'franchise_id' => $franchise->id,
                            'character_description' => $item['description'],
                            'description_source' => $item['description_source'],
                            'character_image' => $item['character_image'],
                        ]);
                        $results['updated']++;
                    } else {
                        Character::create([
                            'character_name' => $item['name'],
                            'slug_name' => $item['slug_name'],
                            'franchise_id' => $franchise->id,
                            'character_description' => $item['description'],
                            'description_source' => $item['description_source'],
                            'character_image' => $item['character_image'],
                        ]);
                        $results['imported']++;
                    }
                }
            } 
            elseif ($type === 'franchises') {
                foreach ($data as $item) {
                    $franchise = Franchise::where('slug_name', $item['slug_name'])->first();
                    if ($franchise) {
                        $franchise->update([
                            'franchise_name' => $item['franchise_name'],
                            'franchise_image' => $item['franchise_image'],
                        ]);
                        $results['updated']++;
                    } else {
                        Franchise::create([
                            'franchise_name' => $item['franchise_name'],
                            'franchise_image' => $item['franchise_image'],
                            'slug_name' => $item['slug_name'],
                        ]);
                        $results['imported']++;
                    }
                }
            }
            elseif ($type === 'fumo_types') {
                foreach ($data as $item) {
                    // Validate required fields
                    $requiredFields = ['fumo_type', 'slug_name', 'type_description'];
                    $missing = [];
                    foreach ($requiredFields as $field) {
                        if (!array_key_exists($field, $item) || $item[$field] === null || $item[$field] === '') {
                            $missing[] = $field;
                        }
                    }
                    if (count($missing) > 0) {
                        $results['skipped']++;
                        $results['skipped_items'][] = [
                            'name' => $item['slug_name'] ?? '(no slug_name)',
                            'reason' => 'Missing required fields: ' . implode(', ', $missing)
                        ];
                        continue;
                    }

                    // Validate types
                    if (!is_string($item['fumo_type']) || !is_string($item['slug_name']) || !is_string($item['type_description'])) {
                        $results['skipped']++;
                        $results['skipped_items'][] = [
                            'name' => $item['slug_name'] ?? '(no slug_name)',
                            'reason' => 'fumo_type, slug_name, and type_description must be strings'
                        ];
                        continue;
                    }

                    // Optional fields
                    $fumo_type_image = array_key_exists('fumo_type_image', $item) ? $item['fumo_type_image'] : null;
                    $is_primary = array_key_exists('is_primary', $item) ? (bool)$item['is_primary'] : true;
                    $width = array_key_exists('width', $item) ? $item['width'] : null;
                    $height = array_key_exists('height', $item) ? $item['height'] : null;

                    // Find by slug_name
                    $fumoType = \App\Models\FumoType::where('slug_name', $item['slug_name'])->first();
                    if ($fumoType) {
                        $fumoType->update([
                            'fumo_type' => $item['fumo_type'],
                            'type_description' => $item['type_description'],
                            'fumo_type_image' => $fumo_type_image,
                            'is_primary' => $is_primary,
                            'width' => $width,
                            'height' => $height,
                        ]);
                        $results['updated']++;
                    } else {
                        \App\Models\FumoType::create([
                            'fumo_type' => $item['fumo_type'],
                            'slug_name' => $item['slug_name'],
                            'type_description' => $item['type_description'],
                            'fumo_type_image' => $fumo_type_image,
                            'is_primary' => $is_primary,
                            'width' => $width,
                            'height' => $height,
                        ]);
                        $results['imported']++;
                    }
                }
            }
            else {
                abort(404);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Import failed: ' . $e->getMessage());
        }

        $message = ucfirst($type) . " import summary:\n";
        $message .= "Imported: {$results['imported']}\n";
        $message .= "Updated: {$results['updated']}\n";
        $message .= "Skipped: {$results['skipped']}\n";
        if ($results['skipped'] > 0) {
            $message .= "\nSkipped items:\n";
            foreach ($results['skipped_items'] as $skipped) {
                $message .= "- {$skipped['name']}: {$skipped['reason']}\n";
            }
            // Shows modal if there were skipped items
            return redirect()->back()->with('alert_modal', $message);
        }

        // If not skipped items, show normal success message
        return redirect()->back()->with('success', str_replace("\n", ' ', $message));
    }
}
