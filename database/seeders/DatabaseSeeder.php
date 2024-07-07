<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\Product\ImageSeeder;
use Database\Seeders\Product\BrandSeeder;
use Database\Seeders\Product\ProductSeeder;
use Database\Seeders\Product\CategorySeeder;
use Database\Seeders\Product\UnityTypeSeeder;
use Database\Seeders\Product\VariationSeeder;
use Database\Seeders\Product\VariationTypeSeeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Jesus Vieira',
            'email' => 'jesusvieiradelima@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345'),
            'remember_token' => Str::random(10),
        ]);

        $this->call([
            BrandSeeder::class,
            CategorySeeder::class,
            UnityTypeSeeder::class,
            ProductSeeder::class,
            VariationTypeSeeder::class,
            VariationSeeder::class,
            ImageSeeder::class,
        ]);
    }
}
