<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Filament\Resources\SettingResource\RelationManagers;
use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;
    protected static ?string $modelLabel = 'Setting';
    protected static ?string $navigationGroup = 'Hệ thống';

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?int $navigationSort = 28;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Thông tin chung')
                    ->schema([
                        Forms\Components\TextInput::make('tittle')
                            ->label('Tiêu đề (vi):')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('address')
                            ->label('Địa chỉ (vi):')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('name')
                            ->label('Tên copyright (vi):')
                            ->maxLength(255)
                            ->required(),
                    ]),
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('email')
                            ->label('Email:')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('hotline')
                            ->label('hotline:')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('phone')
                            ->label('Điện thoại:')
                            ->maxLength(255)
                            ->required(),
                        Forms\Components\TextInput::make('zalo')
                            ->label('Zalo:')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('website')
                            ->label('Website')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('fanpage')
                            ->label('Fanpage:')
                            ->maxLength(255)
                            ->required(),
                        Forms\Components\TextInput::make('map')
                            ->label('Tọa độ google map :')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('link')
                            ->label('Link chỉ đường :')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TimePicker::make('time')
                            ->label('Thời gian làm việc:')
                            ->required(),
                        Forms\Components\TextInput::make('product_number')
                            ->label('Số sản phẩm/Trang:')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('related_product_number')
                            ->label('Số sản phẩm liên quan/Trang :')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('posts')
                            ->label('Số bài viết/Trang:')
                            ->maxLength(255)
                            ->required(),
                        Forms\Components\TextInput::make('related_posts')
                            ->label('Số bài viết liên quan/ Trang :')
                            ->maxLength(255)
                            ->required(),
                        Forms\Components\Textarea::make('map_iframe')
                            ->label('Tọa độ google map iframe:')
                            ->required()
                            ->columnSpan('full'),
                        Forms\Components\Textarea::make('google_analytic')
                            ->label('Google analytics:')
                            ->required()
                            ->columnSpan('full'),
                        Forms\Components\Textarea::make('google_webmaster_tool')
                            ->label('Google Webmaster Tool:')
                            ->required()
                            ->columnSpan('full'),

                    ])->columns(3),

                Forms\Components\Section::make('Nội dung SEO')
                    ->schema([
                        Forms\Components\Grid::make()
                            ->relationship('seo')
                            ->schema([
                                Forms\Components\TextInput::make('seo_tittle')
                                    ->required()
                                    ->maxValue(50)
                                    ->live(onBlur: true),
                                Forms\Components\TextInput::make('seo_keyword')
                                    ->required()
                                    ->maxValue(50)
                                    ->live(onBlur: true),
                                Forms\Components\Textarea::make('seo_description')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->columnSpan('full'),
                            ]),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSetting::route('/create'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}
