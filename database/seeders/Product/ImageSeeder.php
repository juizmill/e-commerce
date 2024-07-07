<?php

declare(strict_types=1);

namespace Database\Seeders\Product;

use App\Models\Product\Image;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Image::factory(10)->create();
    }
}
