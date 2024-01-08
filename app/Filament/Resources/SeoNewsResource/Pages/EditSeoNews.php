<?php

namespace App\Filament\Resources\SeoNewsResource\Pages;

use App\Filament\Resources\SeoNewsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSeoNews extends EditRecord
{
    protected static string $resource = SeoNewsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
