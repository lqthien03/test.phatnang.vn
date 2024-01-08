<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LiquidationResource\Pages;
use App\Filament\Resources\LiquidationResource\RelationManagers;
use App\Models\Liquidation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class LiquidationResource extends Resource
{
    protected static ?string $model = Liquidation::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Quản lý trang tĩnh';

    protected static ?int $navigationSort = 10;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Nội dung sản phẩm')
                            ->schema([
                                Forms\Components\TextInput::make('tittle')
                                    ->label('Tiêu đề')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(function (string $operation, string $state, Forms\Set $set) {
                                        $set('link', Str::slug($state));
                                    }),
                                Forms\Components\TextInput::make('link')
                                    ->label('Link')
                                    ->disabled()
                                    ->dehydrated()
                                    ->required(),
                                Forms\Components\Textarea::make('describe')
                                    ->label('Mô tả')
                                    ->required()
                                    ->maxLength(255)
                                    ->columnSpan('full'),
                                Forms\Components\Toggle::make('display')
                                    ->label('Hiển thị')
                                    ->default(true),
                                Forms\Components\Toggle::make('outstand')
                                    ->label('Nổi bật')
                                    ->default(true),
                            ])
                            ->columns(2),
                    ])
                    ->columnSpan(['lg' => 2]),

                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make()
                            ->schema([
                                Forms\Components\FileUpload::make('image')
                                    ->label('Hình ảnh')

                            ]),

                    ])
                    ->columnSpan(['lg' => 1]),
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
            ])
            ->columns(3);
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
            'index' => Pages\ListLiquidations::route('/'),
            'create' => Pages\CreateLiquidation::route('/create'),
            'edit' => Pages\EditLiquidation::route('/{record}/edit'),
        ];
    }
}
