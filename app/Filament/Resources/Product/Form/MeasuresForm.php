<?php

declare(strict_types=1);

namespace App\Filament\Resources\Product\Form;

use Filament\Forms;

class MeasuresForm
{
    public static function create(): array
    {
        return [
            Forms\Components\TextInput::make('warranty')
                ->required()
                ->numeric()
                ->default(0),

            Forms\Components\TextInput::make('height')
                ->required()
                ->numeric(),

            Forms\Components\TextInput::make('width')
                ->required()
                ->numeric(),

            Forms\Components\TextInput::make('length')
                ->required()
                ->numeric(),

            Forms\Components\TextInput::make('weight')
                ->required()
                ->numeric(),
        ];
    }
}
