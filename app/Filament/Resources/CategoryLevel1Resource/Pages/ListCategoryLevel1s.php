<?php

namespace App\Filament\Resources\CategoryLevel1Resource\Pages;

use App\Filament\Resources\CategoryLevel1Resource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCategoryLevel1s extends ListRecords
{
    protected static string $resource = CategoryLevel1Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
