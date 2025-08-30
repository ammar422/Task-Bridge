<?php

namespace Modules\Projects\Database\Factories;

use Modules\Users\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Projects\Models\Project::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'status' => $this->faker->randomElement(['active', 'completed', 'archived']),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->optional()->date(),
            'owner_id' => User::inrandomOrder()->where('title', 'owner')->first()->id,
        ];
    }
}
