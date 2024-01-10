<?php

namespace App\Filament\Pages;

use App\Models\Footer;
use Filament\Actions\Action;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Support\Exceptions\Halt;

class EditFooter extends Page implements HasForms
{
    protected static ?string $model = Footer::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Quản lý trang tĩnh';
    public ?array $footerData = [];
    public Footer $footer;
    public function mount(): void
    {
        $this->footer = Footer::find(1);
        $this->footerData = $this->footer->attributesToArray();
    }

    protected static string $view = 'filament.pages.edit-footer';
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()
                    ->schema([
                        Section::make('Nội dung sản phẩm')
                            ->schema([
                                TextInput::make('tittle')
                                    ->label('Tiêu đề')
                                    ->required()
                                    ->maxLength(255)
                                    ->columnSpan('full'),
                                Textarea::make('content')
                                    ->label('Mô tả')
                                    ->required()
                                    ->maxLength(255)
                                    ->columnSpan('full'),
                                Toggle::make('display')
                                    ->label('Hiển thị')
                                    ->default(true),
                            ])
                            ->columns(2),
                    ])
                    ->statePath('footerData')
                    ->columnSpan(['lg' => 3]),
            ])
            ->columns(3);
    }
    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label(__('filament-panels::resources/pages/edit-record.form.actions.save.label'))
                ->submit('save'),
        ];
    }
    public function save(): void
    {
        try {
            $data = $this->form->getState();
            $this->footer->update($data['footerData']);
        } catch (Halt $exception) {
            return;
        }
        Notification::make()
            ->success()
            ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'))
            ->send();
    }
}
