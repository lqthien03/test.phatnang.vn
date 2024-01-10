<?php

namespace App\Filament\Pages;

use App\Models\Slogan;
use Filament\Actions\Action;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Support\Exceptions\Halt;

class EditSlogan extends Page implements HasForms
{
    protected static ?string $model = Slogan::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Quản lý trang tĩnh';
    public ?array $sloganData = [];
    protected static string $view = 'filament.pages.edit-slogan';
    public Slogan $slogan;
    public function mount(): void
    {
        $this->slogan = Slogan::find(1);
        $this->sloganData = $this->slogan->attributesToArray();
    }
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
                                Toggle::make('display')
                                    ->label('Hiển thị')
                                    ->default(true),
                            ]),
                    ])
                    ->statePath('sloganData')
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
            $this->slogan->update($data['sloganData']);
        } catch (Halt $exception) {
            return;
        }
        Notification::make()
            ->success()
            ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'))
            ->send();
    }
}
