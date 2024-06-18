<div style="display: flex;">
    <div style="flex:1;">
        <p>Của hàng : {{ env('APP_NAME') }}</p>
    </div>
    <div style="flex:1;">
        <p>mã đơn hàng #{{ $order->trading_code }}</p>
        <p>SĐT : {{ $order->phone }}</p>
        <p>địa chỉ : {{ join('/', !empty($order->address) ? json_decode($order->address, true) : []) }}</p>
    </div>
</div>
<ol>
    @foreach ($order->order_items as $orderItem)
        <li>{{ $orderItem->variation->name }} màu: {{ $orderItem->variation->color }} - kích thước: {{ $orderItem->variation->size }} x {{ $orderItem->quantity }} </li>
    @endforeach
</ol>

<p>Tổng số lượng: {{ $order->order_items->sum('quantity') }} </p>
<p>Tổng đơn hàng: {{ number_format(
    $order->order_items->sum(function ($item) {
        return $item->quantity * $item->price;
    }),
) }}</p>
