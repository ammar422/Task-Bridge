<?php

namespace Modules\Projects\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Projects\Models\Project;
use Modules\Users\Models\User;

class ProjectsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::factory()->count(20)->create();
        foreach (User::whereNot('role', 'admin')->get() as $user) {
            $user->projects()->attach(
                Project::inRandomOrder()->take(rand(1, 3))->pluck('id')->toArray() , ['created_at' => now(), 'updated_at' => now()]
            );
        }
    }
}
