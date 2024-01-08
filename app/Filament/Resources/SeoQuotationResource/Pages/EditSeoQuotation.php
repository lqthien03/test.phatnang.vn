<?php

namespace App\Filament\Resources\SeoQuotationResource\Pages;

use App\Filament\Resources\SeoQuotationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSeoQuotation extends EditRecord
{
    protected static string $resource = SeoQuotationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
