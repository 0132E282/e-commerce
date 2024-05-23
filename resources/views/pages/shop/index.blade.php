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
    <div class="row">
        <div class="col-sm-3">
            <x-sidebar.left-sidebar />
        </div>
        <div class="col-sm-9 padding-right">
            <div class="features_items">
                <x-home.features-item :data="$productList" column="3" />
            </div>
        </div>
    </div>
    <div>
        {{ $productList->links() }}
    </div>
@endsection
