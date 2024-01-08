<?php

namespace App\Filament\Resources\CategoryLevel2Resource\Pages;

use App\Filament\Resources\CategoryLevel2Resource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCategoryLevel2 extends EditRecord
{
    protected static string $resource = CategoryLevel2Resource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
