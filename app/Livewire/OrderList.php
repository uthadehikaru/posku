<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class OrderList extends Component
{
    use WithPagination;
    
    public function render()
    {
        $orders = Order::latest()->paginate(10);
        return view('livewire.order-list', compact('orders'));
    }
}
