<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FumoTypeSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('fumo_types')->insert([
            ['fumo_type' => 'Standard Type'],
            ['fumo_type' => 'Nendoroid Type'],
            ['fumo_type' => 'Plush Strap Type'],
            ['fumo_type' => 'Mannaka (Medium) Type'],
            ['fumo_type' => 'Deka Type'],
            ['fumo_type' => 'Puppet Type']
        ]);
    }
}
