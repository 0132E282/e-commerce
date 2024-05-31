@extends('/include/layouts/web-layout-default')
@php
    $titleShop = Route::current()->parameters()['category']->slug ?? (Route::current()->parameters()['brands']->slug ?? 'shop');
@endphp
@section('seo')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{{ $titleShop }} | E-Shopper</title>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-3">
            <x-sidebar.left-sidebar />
        </div>
        <div class="col-sm-9 padding-right">
            @if ($productList->count() > 0)
                <div class="features_items">
                    <x-home.features-item :data="$productList" column="3" />
                </div>
                <div>
                    {{ $productList->links() }}
                </div>
            @else
                <p style="text-align: center;">Rất tiết chung tôi không có sản phẩm</p>
            @endif
        </div>

    </div>
@endsection
