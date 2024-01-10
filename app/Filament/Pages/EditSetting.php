<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Actions\Action;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Support\Exceptions\Halt;

class EditSetting extends Page implements HasForms
{
    use InteractsWithForms;
    protected static ?string $model = Setting::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Hệ thống';
    public ?array $settingData = [];
    public array $seoData = [];
    protected static string $view = 'filament.pages.edit-setting';
    public Setting $setting;
    public function mount(): void
    {
        $this->setting = Setting::find(1);
        $this->settingData = $this->setting->attributesToArray();
        $this->seoData = $this->setting->with('seo')->first()->seo->attributesToArray() ?? [];
    }
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()
                    ->schema([
                        Section::make('Thông tin chung')
                            ->schema([
                                TextInput::make('tittle')
                                    ->label('Tiêu đề (vi):')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('address')
                                    ->label('Địa chỉ (vi):')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('name')
                                    ->label('Tên copyright (vi):')
                                    ->maxLength(255)
                                    ->required(),
                            ]),
                        Section::make()
                            ->schema([
                                TextInput::make('email')
                                    ->label('Email:')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('hotline')
                                    ->label('hotline:')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('phone')
                                    ->label('Điện thoại:')
                                    ->maxLength(255)
                                    ->required(),
                                TextInput::make('zalo')
                                    ->label('Zalo:')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('website')
                                    ->label('Website')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('fanpage')
                                    ->label('Fanpage:')
                                    ->maxLength(255)
                                    ->required(),
                                TextInput::make('map')
                                    ->label('Tọa độ google map :')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('link')
                                    ->label('Link chỉ đường :')
                                    ->required()
                                    ->maxLength(255),
                                TimePicker::make('time')
                                    ->label('Thời gian làm việc:')
                                    ->required(),
                                TextInput::make('product_number')
                                    ->label('Số sản phẩm/Trang:')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('related_product_number')
                                    ->label('Số sản phẩm liên quan/Trang :')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('posts')
                                    ->label('Số bài viết/Trang:')
                                    ->maxLength(255)
                                    ->required(),
                                TextInput::make('related_posts')
                                    ->label('Số bài viết liên quan/ Trang :')
                                    ->maxLength(255)
                                    ->required(),
                                Textarea::make('map_iframe')
                                    ->label('Tọa độ google map iframe:')
                                    ->required()
                                    ->columnSpan('full'),
                                Textarea::make('google_analytic')
                                    ->label('Google analytics:')
                                    ->required()
                                    ->columnSpan('full'),
                                Textarea::make('google_webmaster_tool')
                                    ->label('Google Webmaster Tool:')
                                    ->required()
                                    ->columnSpan('full'),

                            ])->columns(3),
                    ])->statePath('settingData'),


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
                            ])->statePath('seoData')
                    ])
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
    public function save(): void
    {
        try {
            $data = $this->form->getState();
            $this->setting->update($data['settingData']);
        } catch (Halt $exception) {
            return;
        }
        Notification::make()
            ->success()
            ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'))
            ->send();
    }
}
