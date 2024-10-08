<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'code' => fake()->randomDigit() . fake()->text(9),
            'name' =>  fake()->text(50),
            'email' => fake()->email(),
            'phone' => fake()->phoneNumber(),
            'image' => fake()->imageUrl(),

        ];
    }
}
