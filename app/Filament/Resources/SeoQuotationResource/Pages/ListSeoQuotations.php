<?php

namespace App\Filament\Resources\SeoQuotationResource\Pages;

use App\Filament\Resources\SeoQuotationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSeoQuotations extends ListRecords
{
    protected static string $resource = SeoQuotationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
