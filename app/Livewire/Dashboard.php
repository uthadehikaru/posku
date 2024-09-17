<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $data['orders'] = Order::latest()->take(5)->get();
        $data['total_30_days'] = Order::where('created_at', '>=', now()->subDays(30))->count();
        $data['revenue'] = Order::where('created_at', '>=', now()->subDays(30))->sum('total_price');
        return view('livewire.dashboard', $data);
    }
}
