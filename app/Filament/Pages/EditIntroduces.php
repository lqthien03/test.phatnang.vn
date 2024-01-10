<?php

namespace App\Filament\Pages;

use App\Models\Introduce;
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


class EditIntroduces extends Page implements HasForms
{
    protected static ?string $model = Introduce::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Quản lý trang tĩnh';
    public ?array $introduceData = [];
    public array $seoData = [];
    protected static string $view = 'filament.pages.edit-introduces';
    use InteractsWithForms;
    public Introduce $introduce;
    public function mount(): void
    {
        $this->introduce = Introduce::find(1);
        $this->introduceData = $this->introduce->attributesToArray();
        $this->seoData = $this->introduce->with('seo')->first()->seo->attributesToArray() ?? [];
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
                                    ->required(),
                                Textarea::make('describe')
                                    ->label('Mô tả')
                                    ->required(),
                                Toggle::make('display')
                                    ->label('Hiển thị')
                                    ->default(true),
                            ]),
                    ])
                    ->statePath('introduceData')
                    ->columnSpan(['lg' => 2]),


                Group::make()
                    ->schema([
                        Section::make()
                            ->schema([
                                FileUpload::make('image')
                                    ->label('Hình ảnh')
                            ]),
                    ])->statePath('introduceData')
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
            ])->columns(3);
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
            $this->introduce->update($data['introduceData']);
        } catch (Halt $exception) {
            return;
        }
        Notification::make()
            ->success()
            ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'))
            ->send();
    }
}
