<?php

namespace App\Filament\Resources\CategoryLevel3Resource\Pages;

use App\Filament\Resources\CategoryLevel3Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCategoryLevel3s extends ListRecords
{
    protected static string $resource = CategoryLevel3Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
