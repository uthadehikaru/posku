<div>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Daftar Pesanan</h1>
        <table class="table w-full">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>No. Pesanan</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                        <td class="font-bold"><a href="{{ route('order-detail', $order) }}" class="text-blue-500 hover:text-blue-700">{{ $order->order_no }}</a></td>
                        <td>Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $orders->links() }}
        </div>
    </div> 
    
</div>
