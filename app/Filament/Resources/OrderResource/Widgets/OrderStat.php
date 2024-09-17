<?php

namespace App\Filament\Resources\OrderResource\Widgets;

use App\Models\Order;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class OrderStat extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Orders', Order::count()),
            Stat::make('Revenue', 'Rp ' . number_format(Order::sum('total_price'), 0, ',', '.')),
            Stat::make('Average Orders', 'Rp ' . number_format(Order::avg('total_price'), 0, ',', '.')),
        ];
    }
}
