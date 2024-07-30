<?php

declare(strict_types=1);

namespace App\Filament\Resources\Product\BrandResource\Pages;

use Filament\Notifications\Notification;
use App\Filament\Resources\Product\BrandResource;
use Filament\Resources\Pages\CreateRecord;

class PublicBrand extends CreateRecord
{
    protected static string $resource = BrandResource::class;

    protected function getRedirectUrl(): string
    {
        // Change this to the URL you want to redirect to after creating a record
        return config('app.url') . '/public-brand';
    }

    public function getBreadcrumbs(): array
    {
        return []; // Remove default breadcrumbs
    }

    protected function getCreatedNotification(): ?Notification
    {
        // Recreate message to be displayed after creating a record
        return Notification::make()
            ->success()
            ->icon('heroicon-o-check-circle')
            ->title(__('Brand Created'))
            ->body(__('The brand has been created.'));
    }

    public function mount(): void
    {
        parent::mount();
        filament()->getCurrentPanel()->topbar(false); // Hide topbar
        filament()->getCurrentPanel()->navigation(false); // Hide navigation
    }

    public static function canAccess(array $parameters = []): bool
    {
        return true; // Allow access to this page
    }
}
