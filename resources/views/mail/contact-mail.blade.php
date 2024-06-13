@php
    $totalPrice = $order->order_items->sum(fn($item) => $item->price * $item->quantity);
    $address = !empty($order->address) ? json_decode($order->address) : [];
@endphp

<div style="padding: 0 0 40px; max-width:1200px ;">
    <div class="mb-4">
        @if ($order->stauts == 1)
            <p>Chúng tôi đã xát nhạn đơn hàng <b>#{{ $order->trading_code }} của bạn </p>
        @elseif ($order->stauts == 0)
            <p>Đơn hàng <b>#{{ $order->trading_code }} của bạn đã hủy</b> </p>
        @else
            <p>Bạn đã đặt thành công đơn hàng mã <b>#{{ $order->trading_code }}</b> giá trị đơn hàng <b>{{ number_format($totalPrice) }} đ</b> thanh toán khi nhận hàng</p>
            <p>Sau khi chúng tôi xác nhận đơn hàng, sản phẩm sẽ được giam đến địa chỉ <b>{{ $address->provinces ?? null }}</b> </p>
        @endif
    </div>
    <div style="margin-bottom: 20px;">
        <b style="margin-bottom: 10px;">Chi tiết đơn hàng </b>
        <table border="1" style="width: 100%;">
            <thead>
                <tr>
                    <td> Thời gian </td>
                    <td>Tên sản phẩm </td>
                    <td> số lượng </td>
                    <td>tổng tiền</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->order_items as $orderItem)
                    <tr style="text-align:center;">
                        <td style="max-width: 50px;">{{ $orderItem->created_at }}</td>
                        <td style="max-width: 200px;">{{ Str::limit($orderItem->variation->name, 50, '...') }}</td>
                        <td>{{ $orderItem->quantity }}</td>
                        <td>{{ number_format($orderItem->quantity * $orderItem->price) }} đ</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <x-Button style="padding: 10px 20px; border-radius: 8px; background-color: #fe980f; color : #fff; margin-bottom: 20px;" link="{{ route('client.shop.view') }}">Tiếp thục mua hàng</x-Button>
</div>
