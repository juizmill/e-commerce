<?php

declare(strict_types=1);

namespace App\Filament\Resources\Product\Form;

use Filament\Forms;

class TaxesForm
{
    public static function create(): array
    {
        return [
            Forms\Components\TextInput::make('ean')
                ->required()
                ->maxLength(13),

            Forms\Components\TextInput::make('pis')
                ->label('PIS (%)')
                ->mask('99,99')
                ->numeric()
                ->required(),

            Forms\Components\TextInput::make('cofins')
                ->label('COFINS (%)')
                ->numeric()
                ->required(),

            Forms\Components\TextInput::make('icms')
                ->label('ICMS (%)')
                ->numeric()
                ->required(),

            Forms\Components\Select::make('tax_origin')
                ->options(config('taxes-origin'))
                ->required(),
        ];
    }
}
