<?php

namespace Database\Seeders\Product;

use App\Models\Product\UnityType;
use Illuminate\Database\Seeder;

class UnityTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UnityType::factory()->count(10)->create();
    }
}
