<?php

namespace App\Filament\Resources\CategoryLevel2Resource\Pages;

use App\Filament\Resources\CategoryLevel2Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCategoryLevel2s extends ListRecords
{
    protected static string $resource = CategoryLevel2Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
