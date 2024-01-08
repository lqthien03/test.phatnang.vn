<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ImageHomeResource\Pages;
use App\Filament\Resources\ImageHomeResource\RelationManagers;
use App\Models\ImageHome;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ImageHomeResource extends Resource
{
    protected static ?string $model = ImageHome::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationGroup = 'Quản lý hình ảnh - video';

    protected static ?int $navigationSort = 14;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Nội dung hình ảnh trang chủ')
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
            'index' => Pages\ListImageHomes::route('/'),
            'create' => Pages\CreateImageHome::route('/create'),
            'edit' => Pages\EditImageHome::route('/{record}/edit'),
        ];
    }
}
