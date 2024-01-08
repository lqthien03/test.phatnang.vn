<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SeoNewsResource\Pages;
use App\Filament\Resources\SeoNewsResource\RelationManagers;
use App\Models\SeoNews;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SeoNewsResource extends Resource
{
    protected static ?string $model = SeoNews::class;

    protected static ?string $navigationIcon = 'heroicon-o-globe-europe-africa';
    protected static ?string $navigationGroup = 'Quản lý SEO page';

    protected static ?int $navigationSort = 26;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Nội dung SEO')
                            ->schema([
                                Forms\Components\TextInput::make('seo_tittle')
                                    ->required()
                                    ->maxValue(50)
                                    ->live(onBlur: true),
                                Forms\Components\TextInput::make('seo_keyword')
                                    ->required()
                                    ->maxValue(50)
                                    ->live(onBlur: true),
                                Forms\Components\RichEditor::make('seo_description')
                                    ->required()
                                    ->maxLength(255),
                            ])
                            ->columns(1),
                    ])
                    ->columnSpan(['lg' => 2]),

                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Hình ảnh SEO')
                            ->schema([
                                Forms\Components\FileUpload::make('image')
                                    ->label('Hình ảnh')
                                    ->required(),
                            ]),
                    ])
                    ->columnSpan(['lg' => 1]),
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
            'index' => Pages\ListSeoNews::route('/'),
            'create' => Pages\CreateSeoNews::route('/create'),
            'edit' => Pages\EditSeoNews::route('/{record}/edit'),
        ];
    }
}