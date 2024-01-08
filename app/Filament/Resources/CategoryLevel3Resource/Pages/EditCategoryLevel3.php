<?php

namespace App\Filament\Resources\CategoryLevel3Resource\Pages;

use App\Filament\Resources\CategoryLevel3Resource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCategoryLevel3 extends EditRecord
{
    protected static string $resource = CategoryLevel3Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
