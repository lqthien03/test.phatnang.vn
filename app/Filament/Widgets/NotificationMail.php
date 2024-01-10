<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\MailResource;
use App\Models\Mail;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class NotificationMail extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';
    protected static ?int $sort = 4;
    public function table(Table $table): Table
    {
        return $table
            ->query(MailResource::getEloquentQuery())
            ->defaultPaginationPageOption(5)
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('Số thứ tự')
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Họ và tên')
                    // ->badge()
                    ->sortable(),
                Tables\Columns\TextColumn::make('phone')
                    ->label('Số điện thoại')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('topic')
                    ->label('Chủ đề')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Thời gian')
                    ->datetime('H:i d/m/Y')
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\Action::make('open')
                    ->url(fn (Mail $record): string => MailResource::getUrl('edit', ['record' => $record])),

            ]);
    }
}
