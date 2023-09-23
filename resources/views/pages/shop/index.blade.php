@extends('/include/layouts/web-layout-default')
@section('seo')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Shop | E-Shopper</title>
@endsection
@section('content-top')
    <section id="advertisement">
        <div class="container">
            <img src="/web/assets/images/shop/advertisement.jpg" alt="" />
        </div>
    </section>
@endsection
@section('content')
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Features Items</h2>
        @if (count($productList) > 0)
            <x-product.group :data="$productList" colmun="4" />
        @else
            <div>
                <img src="/web/assets//images/404/404.png" alt="">
            </div>
        @endif
    </div>
    <div>
        {{ $productList->links() }}
    </div>
@endsection
