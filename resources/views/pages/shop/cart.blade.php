@extends('include.layouts.web-layout-default')
@section('seo')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>cart | E-Shopper</title>
@endsection
@php
    $totalProduct = array_reduce($products, function ($tola, $product) {
        return $tola + $product['quantity'];
    });
    $totalPrice = array_reduce($products, fn($tola, $product) => $tola + $product['quantity'] * $product['price_product']);
@endphp
@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="table-responsive cart_info" style="height: 400px;">
                <x-product.table-cart-product :data="$products" />
            </div>
        </div>
    </section>
    <section id="do_action">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="total_area">
                        <ul>
                            <li>Số lượng <span class="total-quantity">{{ number_format($totalProduct) }}</span></li>
                            <li>phí vận chuyển <span>Free</span></li>
                            <li>tổng cộng <span class="total-price">{{ number_format($totalPrice) }} đ</span></li>
                        </ul>
                        <a class="btn btn-default update" href="{{ route('client.shop.checkout') }}">mua</a>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#do_action-->
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            function formatNumberMony(mony, option = {}) {
                option = {
                    style: 'currency',
                    currency: 'VND',
                    ...option
                }
                return mony.toLocaleString('vi-VN', option);
            }

            function renderHtmlStatics(data) {
                const totalPrice = data.reduce((totalPrice, cart) => totalPrice + (cart.price_product * Number(cart.quantity)), 0);
                const totalQuantity = data.reduce((totalQuantity, cart) => Number(totalQuantity) + Number(cart.quantity), 0);
                $('.total-quantity').text(totalQuantity)
                $('.total-price').text(formatNumberMony(totalPrice))

            }
            $('.btn-quantity .btn-add').on('click', function(e) {
                const input = $(this).siblings('input[name="quantity"]');
                input.val(Number(input.val()) + 1);
            })

            $('.btn-quantity .btn-dow').on('click', function(e) {
                const input = $(this).siblings('input[name="quantity"]');
                input.val(Number(input.val()) - 1);
            })
            $('.btn-quantity input[name="quantity"]').on('input', function() {
                const route = $(this).closest('.btn-quantity').data('route');
                const variant = $(this).closest('.table-row').data('variant');
                const data = {
                    quantity: Number($(this).val())
                }
                $.ajax({
                    url: route,
                    method: 'POST',
                    data: data,
                    success: function(res) {
                        const currentProduct = res.data.cart[variant];
                        $(this).val(currentProduct.quantity);
                        const totalPriceItem = formatNumberMony((Number(currentProduct.quantity) * Number(currentProduct.price_product)));
                        toastr.success('đã thêm số lượng sản phẩm')
                        $('.cart_total_price').text(totalPriceItem);
                        renderHtmlStatics(Object.values(res.data.cart));
                    },
                    error: function() {

                    }
                });
            });
            $('.cart_quantity_delete').on('click', function() {
                const route = $(this).data('route');
                const row = $(this).closest('.table-row');
                $.ajax({
                    url: route,
                    method: 'DELETE',
                    success: function(res) {
                        row.remove();
                        renderHtmlStatics(Object.values(res.data.cart));
                        $('.quantity-cart').text(res.data.total)
                    }
                })
            });
        })
    </script>
@endpush
