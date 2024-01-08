<?php

namespace App\Filament\Resources\SloganResource\Pages;

use App\Filament\Resources\SloganResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSlogan extends EditRecord
{
    protected static string $resource = SloganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
