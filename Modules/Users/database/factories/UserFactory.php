<?php

namespace Modules\Users\Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Users\Models\User::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid(),
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => bcrypt(123456), // default password
            // 'role' => $this->faker->randomElement(['admin', 'user', 'guest']),
            'role' => 'user',
            'profile_photo_path' => $this->faker->optional()->imageUrl(200, 200, 'people'),
            'phone_number' => $this->faker->optional()->phoneNumber(),
            // 'status' => $this->faker->randomElement(['active', 'inactive', 'banned']),
            'status' => 'active',
        ];
    }
}
