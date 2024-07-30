<?php

namespace Database\Factories\Product;

use App\Models\Product\Brand;
use App\Models\Product\Category;
use App\Models\Product\Product;
use App\Models\Product\UnityType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'ncm' => fake()->ean8(),
            'height' => fake()->numberBetween(0, 1000),
            'width' => fake()->numberBetween(0, 1000),
            'length' => fake()->numberBetween(0, 1000),
            'weight' => fake()->numberBetween(0, 1000),
            'tax_origin' => fake()->numberBetween(0, 10),
            'description' => fake()->text(),
            'short_description' => fake()->text(),
            'is_active' => true,
            'category_id' => Category::query()->inRandomOrder()->first()->id,
            'brand_id' => Brand::query()->inRandomOrder()->first()->id,
            'unity_type_id' => UnityType::query()->inRandomOrder()->first()->id,
        ];
    }
}
