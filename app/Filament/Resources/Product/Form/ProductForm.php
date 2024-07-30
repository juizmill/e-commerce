<?php

declare(strict_types=1);

namespace App\Filament\Resources\Product\Form;

use Filament\Forms;

class ProductForm
{
    public static function create(): array
    {
        return [
            Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(65),

            Forms\Components\TextInput::make('ncm')
                ->required()
                ->maxLength(8),

            Forms\Components\TextInput::make('cest')
                ->maxLength(7),

            Forms\Components\Textarea::make('description')
                ->required()
                ->columnSpanFull(),

            Forms\Components\Textarea::make('short_description')
                ->required()
                ->columnSpanFull(),

            Forms\Components\Select::make('category_id')
                ->required()
                ->relationship('category', 'name'),

            Forms\Components\Select::make('brand_id')
                ->required()
                ->relationship('brand', 'name'),

            Forms\Components\Select::make('unity_type_id')
                ->required()
                ->relationship('unityType', 'name'),

            Forms\Components\Toggle::make('is_active'),
        ];
    }
}
