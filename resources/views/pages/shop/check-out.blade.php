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
            <div class="step-one">
                <div class="register-req">
                    <p>Vui lòng sử dụng Đăng ký và Thanh toán để dễ dàng truy cập vào lịch sử đặt hàng của bạn hoặc sử dụng Checkout với tư cách Khách</p>
                </div>
                <div class="shopper-informations">
                    <x-form.form-order textButton="Đặt hàng ngay" />
                </div>
            </div>
    </section> <!--/#cart_items-->
@endsection
