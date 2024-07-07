<?php

declare(strict_types=1);

namespace Database\Factories\Product;

use App\Models\Product\Product;
use App\Models\Product\Variation;
use App\Models\Product\VariationType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Variation>
 */
class VariationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'price' => 'R$ 10,98',
            'purchase_price' => 'R$ 20,78',
            'quantity' => $this->faker->numberBetween(100, 1000),
            'sku' => $this->faker->ean8,
            'model' => $this->faker->word,
            'ean' => $this->faker->ean13,
            'pis' => $this->faker->numberBetween(1, 1000),
            'cofins' => $this->faker->numberBetween(1, 1000),
            'icms' => $this->faker->numberBetween(1, 1000),
            'variation_type_id' => VariationType::query()->inRandomOrder()->first()->id,
            'product_id' => Product::query()->inRandomOrder()->first()->id,
        ];
    }
}
