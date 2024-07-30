<?php

declare(strict_types=1);

namespace Database\Seeders\Product;

use App\Models\Product\Variation;
use Illuminate\Database\Seeder;

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
