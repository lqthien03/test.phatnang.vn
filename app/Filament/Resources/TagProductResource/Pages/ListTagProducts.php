<?php

namespace App\Filament\Resources\TagProductResource\Pages;

use App\Filament\Resources\TagProductResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTagProducts extends ListRecords
{
    protected static string $resource = TagProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
