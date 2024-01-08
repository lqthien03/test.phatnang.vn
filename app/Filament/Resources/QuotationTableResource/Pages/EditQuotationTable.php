<?php

namespace App\Filament\Resources\QuotationTableResource\Pages;

use App\Filament\Resources\QuotationTableResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditQuotationTable extends EditRecord
{
    protected static string $resource = QuotationTableResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
