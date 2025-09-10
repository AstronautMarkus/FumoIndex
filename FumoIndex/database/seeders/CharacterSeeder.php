<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CharacterSeeder extends Seeder
{
    public function run()
    {
        $characters = json_decode(File::get(database_path('data/characters.json')), true);

        foreach ($characters as $character) {
            $franchise = DB::table('franchises')->where('id', $character['franchise_id'])->first();
            $franchiseSlug = Str::slug($franchise->franchise_name, '_');
            $characterSlug = Str::slug($character['name'], '_');

            DB::table('characters')->insert([
                'character_name' => $character['name'],
                'character_image' => "$franchiseSlug/$characterSlug.png",
                'character_description' => $character['description'] ?? null,
                'description_source' => $character['description_source'] ?? null,
                'slug_name' => $characterSlug,
                'franchise_id' => $character['franchise_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
