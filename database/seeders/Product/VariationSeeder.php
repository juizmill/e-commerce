<?php

declare(strict_types=1);

namespace Database\Seeders\Product;

use Illuminate\Database\Seeder;
use App\Models\Product\Variation;

class VariationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Variation::factory()->count(10)->create();
    }
}
