<?php

declare(strict_types=1);

namespace Database\Seeders\Product;

use App\Models\Product\VariationType;
use Illuminate\Database\Seeder;

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
