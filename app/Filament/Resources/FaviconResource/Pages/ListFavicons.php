<?php

namespace App\Filament\Resources\FaviconResource\Pages;

use App\Filament\Resources\FaviconResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFavicons extends ListRecords
{
    protected static string $resource = FaviconResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
