<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FranchiseSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('franchises')->insert([
            ['franchise_name' => 'Touhou Project'],
        ]);
    }
}
