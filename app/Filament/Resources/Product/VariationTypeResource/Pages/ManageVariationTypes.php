<?php

namespace App\Filament\Resources\Product\VariationTypeResource\Pages;

use App\Filament\Resources\Product\VariationTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageVariationTypes extends ManageRecords
{
    protected static string $resource = VariationTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
