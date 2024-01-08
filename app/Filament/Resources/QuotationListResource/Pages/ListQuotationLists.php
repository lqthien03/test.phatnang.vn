<?php

namespace App\Filament\Resources\QuotationListResource\Pages;

use App\Filament\Resources\QuotationListResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListQuotationLists extends ListRecords
{
    protected static string $resource = QuotationListResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
