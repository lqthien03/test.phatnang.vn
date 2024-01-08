<?php

namespace App\Filament\Resources\SeoVideosResource\Pages;

use App\Filament\Resources\SeoVideosResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSeoVideos extends EditRecord
{
    protected static string $resource = SeoVideosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
