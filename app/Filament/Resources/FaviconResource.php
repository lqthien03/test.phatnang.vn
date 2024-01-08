<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FaviconResource\Pages;
use App\Filament\Resources\FaviconResource\RelationManagers;
use App\Models\Favicon;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FaviconResource extends Resource
{
    protected static ?string $model = Favicon::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationGroup = 'Quản lý hình ảnh - video';

    protected static ?int $navigationSort = 16;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Chi tiết favicon')
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->label('Hình ảnh'),
                        Forms\Components\Toggle::make('display')
                            ->label('Hiển thị')
                            ->default(true),
                    ])->columnSpan(['lg' => 1]),
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
            'index' => Pages\ListFavicons::route('/'),
            'create' => Pages\CreateFavicon::route('/create'),
            'edit' => Pages\EditFavicon::route('/{record}/edit'),
        ];
    }
}
