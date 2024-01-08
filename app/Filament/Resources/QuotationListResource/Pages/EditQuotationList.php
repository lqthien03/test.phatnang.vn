<?php

namespace App\Filament\Resources\QuotationListResource\Pages;

use App\Filament\Resources\QuotationListResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditQuotationList extends EditRecord
{
    protected static string $resource = QuotationListResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
