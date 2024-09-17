<div>
    <div class="flex flex-col md:flex-row">
        <!-- Products Card on the left -->
        <div class="w-full md:w-2/3 p-4">
            <div class="card bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">Products</h2>
                    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
                        <!-- Sample product items, replace with your actual product data -->
                        @foreach ($products as $product)
                            <div class="card bg-base-200 shadow-sm">
                                <figure>
                                    <img src="{{ $product['image'] ? asset('storage/' . $product['image']) : asset('item.png') }}" width="100" height="100" class="p-2" alt="Product {{ $product['sku'] }}" />
                                </figure>
                                <div class="card-body p-4">
                                    <h3 class="card-title text-sm">{{ $product['name'] }}</h3>
                                    <p class="text-xs">Rp {{ number_format($product['price'], 0, ',', '.') }}</p>
                                    <div class="flex items-center mt-2 w-full justify-center">
                                        <button wire:click="decreaseQty('{{ $product['sku'] }}')" class="btn btn-sm btn-outline">-</button>
                                        <input type="number" wire:model="products.{{ $product['sku'] }}.qty" class="input input-bordered input-sm w-16 mx-2" min="1" value="1">
                                        <button wire:click="increaseQty('{{ $product['sku'] }}')" class="btn btn-sm btn-outline">+</button>
                                    </div>
                                    <button wire:click="addToCart('{{ $product['sku'] }}')" class="btn btn-primary btn-sm ml-2">Add</button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Order List Card on the right -->
        <div class="w-full md:w-1/3 p-4">
            @if(session('message'))
                <div class="alert alert-success mb-4">
                    {{ session('message') }}
                </div>
            @endif
            <div class="card bg-base-100 shadow-xl sticky top-4">
                <div class="card-body">
                    <h2 class="card-title">Order List</h2>
                    <ul class="list-none p-0">
                        @forelse($cart as $item)
                            <li class="flex justify-between items-center mb-2">
                                <span>{{ $item['name'] }} x {{ $item['qty'] }}</span>
                                <span>Rp {{ number_format($item['price'] * $item['qty'], 0, ',', '.') }}</span>
                                <button wire:click="removeFromCart('{{ $item['sku'] }}')" class="btn btn-sm btn-ghost">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </li>
                        @empty
                            <li class="text-center text-gray-500">No items in cart</li>
                        @endforelse
                    </ul>
                    <div class="divider"></div>
                    <div class="flex justify-between items-center font-bold">
                        <span>Total</span>
                        <span>Rp {{ number_format($totalPrice, 0, ',', '.') }}</span>
                    </div>
                    <button wire:click="checkout" class="btn btn-primary mt-4 w-full">Checkout</button>
                </div>
            </div>
        </div>
    </div>
</div>