@extends('/include/layouts/web-layout-empty')
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
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Check out</li>
                </ol>
            </div><!--/breadcrums-->

            <div class="step-one">
                <div class="register-req">
                    <p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
                </div><!--/register-req-->

                <div class="shopper-informations">
                    <x-form action="{{ route('create-order') }}" method="post" custom="{{ true }}">
                        <div class="row">
                            <div class="col-sm-8 ">
                                <div class="shopper-info">
                                    <p>thông tinh đặt hàng</p>
                                    <x-input-form name="name" placeholder="tên của bạn" />
                                    <x-input-form name="phone_number" placeholder="số điện thoại" />
                                    <x-input-form type="email" name="email" placeholder="email" />
                                    <x-select-form name="city" :dataSelect="[]" head titleOptions="tỉnh thành phố" />
                                    <x-input-form name="address" placeholder="địa chỉ cụ thể" />
                                </div>
                                <x-Button type="submit">đặng hàng</x-Button>
                            </div>

                            <div class="col-sm-4">
                                <div class="order-message">
                                    <p>nghi chú</p>
                                    <textarea name="message" placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
                                    <label><input type="checkbox"> Shipping to bill address</label>
                                </div>
                            </div>
                        </div>
                    </x-form>
                </div>
            </div>
    </section> <!--/#cart_items-->
@endsection
