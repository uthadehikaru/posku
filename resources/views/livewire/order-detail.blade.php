<div>
    <div class="container mx-auto p-4">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">{{ $order->order_no }}</h1>
            <a href="{{ route('order-list') }}" class="btn btn-warning btn-sm">Kembali</a>
        </div>
        <table class="table w-full">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Harga Satuan</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach(json_decode($order->items, true) as $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>Rp {{ number_format($item['price'], 0, ',', '.') }}</td> 
                        <td>{{ $item['qty'] }}</td>
                        <td>Rp {{ number_format($item['price'] * $item['qty'], 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            <h2 class="text-xl font-bold mb-2">Total Harga</h2> 
            <p class="text-lg">Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>
        </div>
    </div>
</div>
