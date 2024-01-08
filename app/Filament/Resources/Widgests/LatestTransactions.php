<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\TransactionResource;
use App\Models\Transaction;
use BezhanSalleh\FilamentShield\Traits\HasWidgetShield;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

// class LatestTransactions extends BaseWidget
// {

//     use HasWidgetShield;

//     protected int | string | array $columnSpan = 'full';

//     protected static ?string $heading = 'latest_transactions';

//     protected static ?int $sort = 2;


//     public function table(Table $table): Table
//     {
//         return $table
//             ->query(TransactionResource::getEloquentQuery())
//             ->defaultPaginationPageOption(5)
//             ->defaultSort('created_at', 'desc')
//             ->columns([
//                 Tables\Columns\TextColumn::make('created_at')
//                     ->label(__('datetime.created_at'))
//                     ->datetime('H:i d/m/Y')
//                     ->sortable(),

//                 Tables\Columns\TextColumn::make('type')
//                     ->label(__('model/transaction.props.type'))
//                     ->badge()
//                     ->sortable(),

//                 Tables\Columns\TextColumn::make('code')
//                     ->label(__('model/transaction.props.code'))
//                     ->searchable()
//                     ->sortable(),

//                 Tables\Columns\TextColumn::make('user.name')
//                     ->label(__('model/user.props.name'))
//                     ->searchable()
//                     ->sortable(),

//                 Tables\Columns\TextColumn::make('status')
//                     ->label(__('model/transaction.props.status'))
//                     ->badge(),

//                 Tables\Columns\TextColumn::make('amount')
//                     ->label(__('model/transaction.props.amount'))
//                     ->sortable()
//                     ->money('vnd')
//             ])
//             ->actions([
//                 Tables\Actions\Action::make('open')
//                     ->url(fn (Transaction $record): string => TransactionResource::getUrl('edit', ['record' => $record])),
//             ]);
//     }

//     public function getTableHeading(): string
//     {
//         return __('admin/main.' . static::$heading);
//     }
// }
