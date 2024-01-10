<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class UsersChart extends ChartWidget
{
    protected static ?string $heading = 'Chart';
    protected static ?string $maxHeight = '1200px';
    public ?string $filter = 'today';
    protected static ?int $sort = 1;

    protected function getData(): array
    {
        $activeFilter = $this->filter;
        // $data = $this->getProductsPerMonth();
        return [

            'datasets' => [
                [
                    'label' => 'Blog posts created',
                    // 'data' => $data['productsPerMonth'],
                    'data' => [0, 10, 5, 2, 21, 32, 45, 74, 65, 45, 77, 89],
                    'backgroundColor' => '#36A2EB',
                    'borderColor' => '#9BD0F5',
                ],
            ],
            // 'labels' => $data['months'],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
    // private function getProductsPerMonth(): array
    // {
    //     $now = Carbon::now();
    //     $productsPerMonth = [];
    //     $months = collect(range(1, 12))->map(function ($month) use ($now, $productsPerMonth) {
    //         $count = Product::whereMonth('created_at', Carbon::parse($now->month($month)->format('Y-m')))->count();
    //         $productsPerMonth[] = $count;
    //         return $now->month($month)->format('M');
    //     })->toArray();
    //     return [
    //         'productsPerMonth' => $productsPerMonth,
    //         'months' => $months
    //     ];
    // }
    protected function getFilters(): ?array
    {
        return [
            'today' => 'Today',
            'week' => 'Last week',
            'month' => 'Last month',
            'year' => 'This year',
        ];
    }
}
