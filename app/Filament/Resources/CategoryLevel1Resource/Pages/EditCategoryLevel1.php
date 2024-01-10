<?php

namespace App\Filament\Resources\CategoryLevel1Resource\Pages;

use App\Filament\Resources\CategoryLevel1Resource;
use Filament\Actions;
use Filament\Notifications\Notification;
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
    // protected function beforeSave(): void
    // {
    //     return Notification::make()
    //         ->success()
    //         ->title('Danh mục cập nhật')
    //         ->body('Danh mục đã cập nhật thành công,');
    //     FacadesNotification::sendToDatabase($notification);
    // }
    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Danh mục cập nhật')
            ->body('Danh mục đã cập nhật thành công,')
            ->sendToDatabase(\auth()->user());
    }
}
