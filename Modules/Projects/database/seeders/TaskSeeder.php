<?php

namespace Modules\Projects\Database\Seeders;

use id;
use Modules\Users\Models\User;
use Illuminate\Database\Seeder;
use Modules\Projects\Models\Task;
use Modules\Projects\Models\Project;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tasks = Task::factory()->count(50)->create();
        $tasks->each(fn($task) => $task->update([
            'project_id' => $this->getRandomProjectId(),
            'user_id' => $this->getRandomUserId(),
        ]));
    }
    public function getRandomProjectId()
    {
        $project = Project::inRandomOrder()->first();
        return $project ? $project->id : null;
    }
    public function getRandomUserId()
    {
        $user = User::inRandomOrder()->whereNot('role', 'admin')->first();
        return $user ? $user->id : null;
    }
}
