<?php

declare(strict_types=1);

namespace Database\Factories\Product;

use App\Models\Product\Image;
use App\Models\Product\Variation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'path' => $this->faker->imageUrl(),
            'description' => $this->faker->sentence(),
            'variation_id' => Variation::query()->inRandomOrder()->first()->id,
        ];
    }
}
