<?php

namespace App\Filament\Resources\FaviconResource\Pages;

use App\Filament\Resources\FaviconResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFavicon extends EditRecord
{
    protected static string $resource = FaviconResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
