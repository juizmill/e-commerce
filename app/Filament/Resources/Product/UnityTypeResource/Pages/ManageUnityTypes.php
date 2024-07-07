<?php

namespace App\Filament\Resources\Product\UnityTypeResource\Pages;

use App\Filament\Resources\Product\UnityTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageUnityTypes extends ManageRecords
{
    protected static string $resource = UnityTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
