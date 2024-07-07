<?php

declare(strict_types=1);

namespace Database\Seeders\Product;

use Illuminate\Database\Seeder;
use App\Models\Product\VariationType;

class VariationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VariationType::factory()->count(10)->create();
    }
}
