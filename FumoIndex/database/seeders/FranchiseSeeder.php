<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class FranchiseSeeder extends Seeder
{
    public function run(): void
    {
        $json = File::get(database_path('data/franchises.json'));
        $franchises = json_decode($json, true);

        foreach ($franchises as &$franchise) {
            $franchiseSlug = Str::slug($franchise['franchise_name'], '_');
            $franchise['franchise_image'] = "https://thefumoindex.s3.us-east-2.amazonaws.com/images/franchises/$franchiseSlug.png";
            $franchise['slug_name'] = $franchiseSlug;
            $franchise['created_at'] = now();
            $franchise['updated_at'] = now();
        }

        DB::table('franchises')->insert($franchises);
    }
}
