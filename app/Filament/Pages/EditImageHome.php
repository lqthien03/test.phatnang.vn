<?php

namespace App\Filament\Pages;

use App\Models\ImageHome;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Support\Exceptions\Halt;

class EditImageHome extends Page implements HasForms
{
    use InteractsWithForms;
    public ?array $imageHome = [];
    protected static ?string $model = ImageHome::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Quản lý hình ảnh - video';
    protected static string $view = 'filament.pages.edit-image-home';
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Nội dung hình ảnh trang chủ')
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
    // public function mount(): void
    // {

    //     $imageHomeId = 1; // Replace with the ID of the contact you want to edit
    //     $imageHome = ImageHome::findOrFail($imageHomeId);

    //     $this->imageHome = [
    //         'image' => $imageHome->image,
    //         'display' => $imageHome->display,

    //         // Add other fields you need from the Contact and its related models
    //     ];
    // }
    public function save(): void
    {
        try {
            $data = $this->form->getState();
            $contactId = $data['id'];
            $contact = ImageHome::findOrFail($contactId);

            $contact->update($data);
        } catch (Halt $exception) {
            return;
        }
        Notification::make()
            ->success()
            ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'))
            ->send();
    }
}
