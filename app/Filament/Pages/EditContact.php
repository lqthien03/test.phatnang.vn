<?php

namespace App\Filament\Pages;

use App\Models\Contact;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Support\Exceptions\Halt;

class EditContact extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $model = Contact::class;
    public ?array $contactData = [];
    public ?array $seoData = [];
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Quản lý trang tĩnh';

    protected static string $view = 'filament.pages.edit-contact';
    public Contact $contact;
    public function mount(): void
    {
        $this->contact = Contact::find(1);
        $this->contactData = $this->contact->attributesToArray();
        $this->seoData = $this->contact->with('seo')->first()->seo->attributesToArray() ?? [];
    }

    public function form(Form $form): Form
    {

        return $form
            ->schema([
                Group::make()
                    ->schema([
                        Section::make('Nội dung sản phẩm')
                            ->schema([
                                Textarea::make('describe')
                                    ->label('Mô tả')
                                    ->required()
                                    ->columnSpan('full'),
                                Toggle::make('display')
                                    ->label('Hiển thị')
                                    ->default(true),
                            ]),
                    ])
                    ->statePath('contactData')
                    ->columnSpan(['lg' => 2]),

                Group::make()
                    ->schema([
                        Section::make()
                            ->schema([
                                FileUpload::make('image')
                                    ->label('Hình ảnh')
                            ]),
                    ])
                    ->columnSpan(['lg' => 1]),
                Section::make('Nội dung SEO')
                    ->schema([
                        Grid::make()
                            // ->relationship('seo')
                            ->schema([
                                TextInput::make('seo_tittle')
                                    ->required()
                                    ->maxValue(50)
                                    ->live(onBlur: true),
                                TextInput::make('seo_keyword')
                                    ->required()
                                    ->maxValue(50)
                                    ->live(onBlur: true),
                                Textarea::make('seo_description')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->columnSpan('full'),
                            ])
                            ->statePath('seoData')
                    ])
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
            $this->contact->update($data['contactData']);
        } catch (Halt $exception) {
            return;
        }
        Notification::make()
            ->success()
            ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'))
            ->send();
    }
}
