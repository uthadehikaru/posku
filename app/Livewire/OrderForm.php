<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\Product;
use Livewire\Component;

class OrderForm extends Component
{
    public $products = [];
    public $cart = [];
    public $totalPrice = 0;
    
    public function mount()
    {
        $products = Product::orderBy('name')->get();
        foreach ($products as $product) {
            $this->products[$product->sku] = [
                'sku' => $product->sku,
                'name' => $product->name,
                'image' => $product->image,
                'qty' => 1,
                'price' => $product->price,
            ];
        }
    }

    public function increaseQty($productId)
    {
        $this->products[$productId]['qty']++;
    }

    public function decreaseQty($productId)
    {
        if ($this->products[$productId]['qty'] > 1) {
            $this->products[$productId]['qty']--;
        }
    }

    public function addToCart($productId)
    {
        $product = $this->products[$productId];
        $existingProductIndex = array_search($product['sku'], array_column($this->cart, 'sku'));
        
        if ($existingProductIndex !== false) {
            $this->cart[$existingProductIndex]['qty'] += $product['qty'];
        } else {
            $this->cart[] = $product;
        }
        $this->calculateTotalPrice();
    }

    public function calculateTotalPrice()
    {
        $this->totalPrice = array_sum(array_map(function($item) {
            return $item['price'] * $item['qty'];
        }, $this->cart));
    }

    public function removeFromCart($productId)
    {
        $this->cart = array_filter($this->cart, function($item) use ($productId) {
            return $item['sku'] !== $productId;
        });
        $this->calculateTotalPrice();
    }

    public function checkout()
    {
        $order = new Order();
        $order->order_no = 'ORD-' . time();
        $order->total_price = $this->totalPrice;
        $order->items = json_encode($this->cart);
        $order->save();
        session()->flash('message', 'Order created: ' . $order->order_no);

        $this->cart = [];
        $this->totalPrice = 0;
    }

    public function render()
    {
        return view('livewire.order-form');
    }
}
