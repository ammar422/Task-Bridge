<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Projects\Database\Seeders\ProjectsDatabaseSeeder;
use Modules\Users\Database\Seeders\UsersDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void

    {
        $this->call([
            UsersDatabaseSeeder::class,
            ProjectsDatabaseSeeder::class
        ]);
    }
}
