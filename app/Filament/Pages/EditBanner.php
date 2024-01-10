<?php

namespace App\Filament\Pages;

use App\Models\Banner;
use Faker\Provider\ar_EG\Text;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Support\Exceptions\Halt;


class EditBanner extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $model = Banner::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Quản lý hình ảnh - video';
    protected static string $view = 'filament.pages.edit-banner';
    // protected static bool $navigation = false;
    public ?array $bannerData = [];
    public ?string $image = '';
    public Banner $banner;
    public function mount(): void
    {

        $this->banner = Banner::find(1);
        $this->bannerData = $this->banner->attributesToArray();
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
                                TextInput::make('link')
                                    ->label('Link đường dẫn')
                                    ->required(),
                                Toggle::make('display')
                                    ->label('Hiển thị')
                                    ->default(true),
                            ]),
                    ])->statePath('bannerData')
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
            $this->banner->update($data['bannerData']);
        } catch (Halt $exception) {
            return;
        }
        Notification::make()
            ->success()
            ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'))
            ->send();
    }
}
