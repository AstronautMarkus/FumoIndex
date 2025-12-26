<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CharacterSeeder extends Seeder
{
    public function run()
    {
        $characters = json_decode(File::get(database_path('data/characters.json')), true);

        foreach ($characters as $character) {
            // Search Franchise by slug_name
            $franchise = DB::table('franchises')->where('slug_name', $character['franchise_slug'])->first();

            // If not exist, skip
            if (!$franchise) {
                continue;
            }

            $franchiseSlug = $franchise->slug_name;
            $characterSlug = Str::slug($character['name'], '_');
            $imagePath = "images/characters/{$franchiseSlug}/{$characterSlug}.png";

            DB::table('characters')->insert([
                'character_name' => $character['name'],
                'character_image' => Storage::disk('s3')->url($imagePath),
                'character_description' => $character['description'] ?? null,
                'description_source' => $character['description_source'] ?? null,
                'slug_name' => $characterSlug,
                'franchise_id' => $franchise->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}