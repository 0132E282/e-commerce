@extends('include/layouts/web-layout-default')
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
    <div class="row">
        <div class="col-sm-12">
            <div class="recommended_items">
                <x-product.recommended-item :data="$TopProductByOrder" title="sản phẩm mua nhiều" />
            </div>
        </div>
        <div class="col-sm-12">
            <div class="recommended_items">
                <x-product.recommended-item :data="$recommendedProduct" title="sản phẩm đề xuất" />
            </div>
        </div>
        <div class="col-sm-3">
            <x-sidebar.left-sidebar />
        </div>
        <div class="col-sm-9 padding-right">
            <div class="features_items">
                <x-home.features-item :data="$products" column="3" />
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <!-- ChartJS -->
    <script src="{{ asset('bootstrap/chart.js/Chart.min.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('bootstrap/jquery-knob/jquery.knob.min.js') }}"></script>
    <script src="{{ asset('bootstrap/jquery-knob/jquery.knob.min.js') }}"></script>
    <script src="{{ asset('dist/js/pages/dashboard3.js') }}"></script>
@endpush
