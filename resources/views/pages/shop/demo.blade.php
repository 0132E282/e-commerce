@extends('/include/layouts/web-layout-not-sidebar')
@section('content')
    <section id="slider"><!--slider-->
        <x-product.group :data="$productList" />
    </section>
@endsection
