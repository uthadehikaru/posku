<div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-4">
        <div class="card bg-base-100 shadow-xl">
            <div class="card-body">
                <h2 class="card-title">Total Pesanan</h2>
                <p class="text-3xl font-bold">{{ $total_30_days }}</p>
                <p class="text-sm text-gray-500">30 hari terakhir</p>
            </div>
        </div>

        <div class="card bg-base-100 shadow-xl">
            <div class="card-body">
                <h2 class="card-title">Pendapatan</h2>
                <p class="text-3xl font-bold">Rp {{ number_format($revenue, 0, ',', '.') }}</p>
                <p class="text-sm text-gray-500">30 hari terakhir</p>
            </div>
        </div>
    </div>
    <div class="p-4">
        <h2 class="text-2xl font-bold mb-4">Pesanan Terbaru</h2>
        <div class="overflow-x-auto">
            <table class="table w-full">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>No. Pesanan</th>
                        <th>Item</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                            <td class="font-bold">{{ $order->order_no }}</td>
                            <td>
                                @foreach(json_decode($order->items) as $item)
                                    {{ $item->name }} x {{ $item->qty }}<br>
                                @endforeach
                            </td>
                            <td>Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
