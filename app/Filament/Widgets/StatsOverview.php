<?php

namespace App\Filament\Widgets;

use App\Models\Category_level1;
use App\Models\Category_level2;
use App\Models\Category_level3;
use App\Models\Product;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Số lượng danh mục 1', Category_level1::count())
                ->color('success')
                ->chart([9, 3, 4, 5, 7, 2, 5, 1]),
            Stat::make('Số lượng danh mục 2', Category_level2::count())
                ->color('success')
                ->chart([9, 3, 4, 5, 7, 2, 5, 1]),
            Stat::make('Số lượng danh mục 3', Category_level3::count())
                ->color('success')
                ->chart([9, 3, 4, 5, 7, 2, 5, 1]),
            Stat::make('Số lượng sản phẩm', Product::count())
                ->color('success')
                ->chart([7, 3, 4, 5, 6, 2, 5, 4]),
        ];
    }
}
