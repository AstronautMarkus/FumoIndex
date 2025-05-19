<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class FumoTypeSeeder extends Seeder
{
    public function run()
    {
        $fumo_types = json_decode(File::get(database_path('data/fumo_types.json')), true);

        foreach ($fumo_types as $fumo_type) {
            DB::table('fumo_types')->insert([
                'fumo_type' => $fumo_type['fumo_type'],
                'type_description' => $fumo_type['type_description'],
                'type_image' => Str::slug($fumo_type['fumo_type'], '_') . '.png',
                'is_primary' => $fumo_type['is_primary'] ?? true,
                'height' => $fumo_type['height'] ?? null,
                'width' => $fumo_type['width'] ?? null,
            ]);
        }
    }
}
