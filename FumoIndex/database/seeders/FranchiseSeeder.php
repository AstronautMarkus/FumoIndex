<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class FranchiseSeeder extends Seeder
{
    public function run(): void
    {

        $json = File::get(database_path('data/franchises.json'));
        $franchises = json_decode($json, true);

        DB::table('franchises')->insert($franchises);
    }
}
