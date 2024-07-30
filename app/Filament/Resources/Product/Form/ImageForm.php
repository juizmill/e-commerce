<?php

declare(strict_types=1);

namespace App\Filament\Resources\Product\Form;

use Filament\Forms;

class ImageForm
{
    public static function create(): array
    {
        return [
            Forms\Components\FileUpload::make('images')
                ->label('Images')
                ->image()
                ->disk(env('FILESYSTEM_DISK'))
                ->multiple()
                ->required()
                ->minFiles(1),
        ];
    }
}
