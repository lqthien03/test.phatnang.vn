<?php

namespace App\Filament\Resources\YesResource\Pages;

use App\Filament\Resources\YesResource;
use Filament\Resources\Pages\Page;

class EditIntroduce extends Page
{
    protected static string $resource = YesResource::class;

    protected static string $view = 'filament.resources.yes-resource.pages.edit-introduce';
}
