<?php

declare(strict_types=1);

namespace Database\Factories\Product;

use App\Models\Product\VariationType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<VariationType>
 */
class VariationTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
        ];
    }
}
