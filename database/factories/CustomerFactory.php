<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                   'name' => fake()->name,
                   'address' => fake()->address,
                   'phone' => Str::limit(fake()->unique()->phoneNumber(),15 , ''),
                   'email' => fake()->unique()->email,
                   'is_active' => rand(0, 1),

        ];
    }
}
