<?php

namespace App\Filament\Pages;

use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Pages\Page;

class EditLogo extends Page implements HasForms
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Quản lý hình ảnh - video';
    protected static string $view = 'filament.pages.edit-logo';
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Chi tiết logo')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Hình ảnh'),
                        Toggle::make('display')
                            ->label('Hiển thị')
                            ->default(true),
                    ])->columnSpan(['lg' => 1]),
            ]);
    }
    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label(__('filament-panels::resources/pages/edit-record.form.actions.save.label'))
                ->submit('save'),
        ];
    }
}
