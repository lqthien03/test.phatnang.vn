<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class BarUsersChart extends ChartWidget
{
    protected static ?string $heading = 'Chart';
    protected static ?int $sort = 2;
    protected function getData(): array
    {
        // $data = Product::select('status', DB::raw('count(*) as count'))
        //     ->groupBy('status')
        //     ->pluck('count', 'status')
        //     ->toArray();
        return [
            'datasets' => [
                [
                    'label' => 'Products',
                    'data' => [65, 59, 80, 81, 56, 55, 40],
                    'backgroundColor' => '#36A2EB',
                    'borderColor' => '#9BD0F5',
                ]
            ],
            // 'labels' => ProductsStatusEnum::cases()
            'labels' => 'labels',
            'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
