@extends('/include/layouts/web-layout-default')
@section('seo')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
@endsection
@section('content-top')
    <section id="slider"><!--slider-->
        <x-slider.Slider-default />
    </section>
@endsection
@section('content')
    <div class="features_items"><!--features_items-->
        <x-home.features-item :data="$newProduct" />
    </div><!--features_items-->

    <div class="category-tab"><!--category-tab-->
        <x-home.category-tab />
    </div><!--/category-tab-->

    <div class="recommended_items"><!--recommended_items-->
        <x-product.recommended-item :data="$recommendedProduct" />

    </div><!--/recommended_items-->
@endsection
