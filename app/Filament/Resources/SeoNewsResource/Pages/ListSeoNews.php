<?php

namespace App\Filament\Resources\SeoNewsResource\Pages;

use App\Filament\Resources\SeoNewsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSeoNews extends ListRecords
{
    protected static string $resource = SeoNewsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
