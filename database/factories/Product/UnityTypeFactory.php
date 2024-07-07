<?php

namespace Database\Factories\Product;

use App\Models\Product\unityType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<unityType>
 */
class UnityTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->name,
        ];
    }
}
