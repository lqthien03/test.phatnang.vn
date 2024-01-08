<?php

namespace App\Filament\Resources\SeoVideosResource\Pages;

use App\Filament\Resources\SeoVideosResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSeoVideos extends ListRecords
{
    protected static string $resource = SeoVideosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
