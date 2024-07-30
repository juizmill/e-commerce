<?php

use Illuminate\Support\Facades\Route;
use App\Filament\Resources\Product\BrandResource\Pages\PublicBrand;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/public-brand', PublicBrand::class);
