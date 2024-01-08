<?php

namespace App\Filament\Resources\QuotationTableResource\Pages;

use App\Filament\Resources\QuotationTableResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListQuotationTables extends ListRecords
{
    protected static string $resource = QuotationTableResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
