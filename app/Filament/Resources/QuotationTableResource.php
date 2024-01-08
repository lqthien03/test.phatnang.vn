<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuotationTableResource\Pages;
use App\Filament\Resources\QuotationTableResource\RelationManagers;
use App\Models\QuotationTable;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class QuotationTableResource extends Resource
{
    protected static ?string $model = QuotationTable::class;

    protected static ?string $navigationIcon = 'heroicon-o-table-cells';
    protected static ?string $navigationGroup = 'Quản lý bảng báo giá';

    protected static ?int $navigationSort = 7;

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
                                    })
                                    ->columnSpan('full'),
                                Forms\Components\Toggle::make('display')
                                    ->label('Hiển thị')
                                    ->default(true),
                            ])
                            ->columns(2),
                    ])
                    ->columnSpan(['lg' => 2]),

                Forms\Components\Group::make()
                    ->schema([

                        Forms\Components\Section::make()
                            ->schema([

                                Forms\Components\Select::make('quotation_level1_id')
                                    ->label('Danh mục cấp 1')
                                    ->relationship(name: 'quotation_level1', titleAttribute: "tittle")
                                    ->required(),

                                Forms\Components\TextInput::make('link')
                                    ->label('Link sản phẩm')
                                    ->required(),
                                Forms\Components\TextInput::make('unit_price')
                                    ->label('Đơn giá')
                                    ->numeric()
                                    ->default(0)
                                    ->minValue(0)
                                    ->required()
                                    ->prefix('VNĐ'),
                                Forms\Components\TextInput::make('wholesale_price')
                                    ->label('Giá sỉ')
                                    ->numeric()
                                    ->default(0)
                                    ->minValue(0)
                                    ->required()
                                    ->prefix('VNĐ'),
                                Forms\Components\TextInput::make('guarangee')
                                    ->label('Bảo hành')
                            ])->columns(1),



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
            'index' => Pages\ListQuotationTables::route('/'),
            'create' => Pages\CreateQuotationTable::route('/create'),
            'edit' => Pages\EditQuotationTable::route('/{record}/edit'),
        ];
    }
}
