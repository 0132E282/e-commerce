@extends('include/layouts/web-layout-empty')
@section('seo')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>check-out | E-Shopper</title>
@endsection

@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="thumbnail" style="max-width: 1200px; margin: 20px auto 50px;padding:59px 20px;">
                @if (!empty($order))
                    <div style=" text-align: center; margin-bottom: 20px;">
                        <img style="max-width: 80px;" src="{{ asset('web/assets/images/payment/check-icone-2048x2048.png') }}" alt="">
                        <h2 style="font-size: 20px; font-weight: 600;"> Đặt hàng thành công</h2>
                        <h4> Mã dao dịch: #{{ $order->trading_code }}</h4>
                    </div>
                    <x-table :tableHead="['Thời gian', 'Tên sản phẩm', 'số lượng', 'tổng tiền']">
                        @foreach ($order->order_items as $orderItem)
                            <tr style="text-align:center;">
                                <td style="max-width: 50px;">{{ $orderItem->created_at }}</td>
                                <td style="max-width: 200px;">{{ Str::limit($orderItem->variation->name, 50, '...') }}</td>
                                <td>{{ $orderItem->quantity }}</td>
                                <td>{{ number_format($orderItem->quantity * $orderItem->price) }} đ</td>
                            </tr>
                        @endforeach
                        <tr style="text-align:center; background-color:rgb(217, 237, 247); ">
                            <td>mã giảm giá :{{ 0 }} </td>
                            <td>phí vận chuyển :0 </td>
                            <td>Tổng số lượng :{{ $order->order_items->sum('quantity') }} </td>
                            <td>Tổng tiền :{{ number_format($order->total) }}đ </td>
                        </tr>
                    </x-table>
                @else
                    <p>dao dich thất baị</p>
                @endif

                <div>
                    <x-button :link="route('client.site.home')">Quay lại trang chủ</x-button>
                </div>
            </div>
        </div>
    </section>
@endsection
