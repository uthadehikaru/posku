<div>
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Order List</h1>
        <table class="table w-full">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Order No</th>
                    <th>Items</th>
                    <th>Total Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->created_at->format('d/m/Y H:i:s') }}</td>
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
        <div class="mt-4">
            {{ $orders->links() }}
        </div>
    </div> 
</div>
