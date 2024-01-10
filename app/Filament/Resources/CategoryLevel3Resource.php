<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryLevel3Resource\Pages;
use App\Filament\Resources\CategoryLevel3Resource\RelationManagers;
use App\Models\Category_level3;
use App\Models\CategoryLevel3;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CategoryLevel3Resource extends Resource
{
    protected static ?string $model = Category_level3::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $modelLabel = 'Danh mục cấp 3';
    protected static ?string $navigationGroup = 'Quản lý sản phẩm';
    protected static ?int $navigationSort = 3;

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
                                    ->maxLength(255),
                                Forms\Components\Toggle::make('display')
                                    ->default(true),
                            ])
                            ->columns(1),
                    ])
                    ->columnSpan(['lg' => 2]),

                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make()
                            ->schema([
                                Forms\Components\Select::make('category_level1_id')
                                    ->label('Danh mục cấp 1')
                                    ->relationship(name: 'category_level1', titleAttribute: 'tittle')
                                    ->required(),
                                Forms\Components\Select::make('category_level2_id')
                                    ->label('Danh mục cấp 2')
                                    ->relationship(name: 'category_level2', titleAttribute: 'tittle')
                                    ->required(),

                            ])->columns(2),

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
                Tables\Columns\TextColumn::make('id')
                    ->label('Số thứ tự'),
                Tables\Columns\ImageColumn::make('image')
                    ->Label('Hình ảnh'),
                Tables\Columns\TextColumn::make('tittle')
                    ->label('Tiêu đề'),
                Tables\Columns\ToggleColumn::make('display')
                    ->label('Hiển thị'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListCategoryLevel3s::route('/'),
            'create' => Pages\CreateCategoryLevel3::route('/create'),
            'edit' => Pages\EditCategoryLevel3::route('/{record}/edit'),
        ];
    }
}
