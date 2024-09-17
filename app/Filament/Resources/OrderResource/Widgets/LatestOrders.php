<?php

namespace App\Filament\Resources\OrderResource\Widgets;

use App\Models\Order;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestOrders extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(
                Order::query()->latest()->limit(5)
            )
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d M Y H:i'),
                Tables\Columns\TextColumn::make('order_no'),
                Tables\Columns\TextColumn::make('total_price')
                    ->numeric()
                    ->prefix('IDR '),
            ]);
    }

    protected static ?int $sort = 2;

    protected int | string | array $columnSpan = 'full';

    protected function getTableHeading(): string
    {
        return 'Latest Orders';
    }
}
