@extends('include.layouts.admin-layout')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card p-4">
                <div>
                    <x-button :link="route('admin.order.index')">Quay lại</x-button>
                </div>
            </div>
            <div class="card p-4">
                @if (session()->has('message'))
                    @php $message = session()->get('message'); @endphp
                    <x-alert message="{{ $message['content'] }}" type="{{ $message['type'] }}" />
                @endif
                <x-form id="form-checkout" :action="route('admin.order.update-customer', ['id' => $order->id])" method="put" custom="{{ true }}">
                    <div class="row">
                        <div class="col-sm-7 ">
                            <div class="shopper-info">
                                <p style="margin-bottom: 20px;">Thông tin đặt hàng</p>
                                <div style="margin-bottom: 20px;">
                                    <x-input name="fullname" placeholder="tên đầy đủ" :value="optional($order)->fullname" />
                                </div>
                                <div style="margin-bottom: 20px;">
                                    <x-input name="phone" placeholder="số điện thoại" :value="optional($order)->phone" />
                                </div>
                                <div style="margin-bottom: 20px;">
                                    <x-input type="email" name="email" placeholder="email" :value="optional($order)->email" />
                                </div>
                                <x-select.provinces :address="json_decode(optional($order)->address, true)" />
                            </div>
                            <div style="margin-bottom: 20px;">
                                <div class="order-message">
                                    <textarea name="note" style="width:100%; height: 100px; outline: none; border-radius: 4px;" maxlength="255" placeholder="Nghi chú đơn hàng nếu có yêu cầu khác">{{ optional($order)->note }}</textarea>

                                </div>
                            </div>
                            <x-button class="btn" style="margin-bottom:20px; " type="submit">Cập nhập</x-button>
                        </div>
                    </div>
                </x-form>
            </div>
        </div>
    </section>
@endsection
