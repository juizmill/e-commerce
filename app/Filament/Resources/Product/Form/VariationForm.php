<?php

declare(strict_types=1);

namespace App\Filament\Resources\Product\Form;

use Filament\Forms;
use Leandrocfe\FilamentPtbrFormFields\Money;

class VariationForm
{
    public static function create(): array
    {
        return [
            Forms\Components\Repeater::make('Variações')
                ->columnSpanFull()
                ->relationship('variations')
                ->required()
                ->minItems(1)
                ->schema([
                    Money::make('price')
                        ->required(),

                    Money::make('purchase_price')
                        ->required(),

                    Forms\Components\TextInput::make('quantity')
                        ->integer()
                        ->default(0)
                        ->required(),

                    Forms\Components\TextInput::make('sku')
                        ->required(),

                    Forms\Components\TextInput::make('model')
                        ->required(),

                    TaxesForm::create()[0],

                    Forms\Components\Select::make('variation_type_id')
                        ->required()
                        ->relationship('variationType', 'name'),

                    ImageForm::create()[0],
                ]),
        ];
    }
}
