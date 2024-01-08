<?php

namespace App\Filament\Resources\CategoryLevel1Resource\Pages;

use App\Filament\Resources\CategoryLevel1Resource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCategoryLevel1 extends EditRecord
{
    protected static string $resource = CategoryLevel1Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
