<?php

namespace App\Filament\Resources\SeoProductResource\Pages;

use App\Filament\Resources\SeoProductResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSeoProducts extends ListRecords
{
    protected static string $resource = SeoProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
