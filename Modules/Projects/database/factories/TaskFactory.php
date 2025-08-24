<?php

namespace Modules\Projects\Database\Factories;

use Modules\Users\Models\User;
use Modules\Projects\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Projects\Models\Task::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid(),
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->paragraph(),
            'status' => $this->faker->randomElement(['pending', 'in_progress', 'completed']),
            'due_date' => $this->faker->optional()->date(),
            'project_id' => Project::inRandomOrder()->first()?->id,
            'user_id' => User::inRandomOrder()->first()?->id,
        ];
    }
}
