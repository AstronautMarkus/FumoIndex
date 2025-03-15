<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $this->call([
            FranchiseSeeder::class,
            FumoTypeSeeder::class,
        ]);
    }
    
}
