<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CharacterSeeder extends Seeder
{
    public function run()
    {
        $characters = [
            ["name" => "Reimu Hakurei", "franchise_id" => 1],
            ["name" => "Marisa Kirisame", "franchise_id" => 1],
        ];

        foreach ($characters as $character) {
            // Get franchise name
            $franchise = DB::table('franchises')->where('id', $character['franchise_id'])->first();
            $franchiseSlug = Str::slug($franchise->franchise_name, '_');
            $characterSlug = Str::slug($character['name'], '_');
            
            DB::table('characters')->insert([
                'character_name' => $character['name'],
                'character_image' => "$franchiseSlug/$characterSlug.png",
                'franchise_id' => $character['franchise_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}