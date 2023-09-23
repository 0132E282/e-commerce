@extends('/include/layouts/web-layout-default')
@section('seo')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{{ $detailProduct->name_product }} | E-Shopper</title>
@endsection
@section('link')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="/vendor/modal/css/main.css">
@endsection

@section('content')
    <div class="product-details"><!--product-details-->
        <div class="col-sm-5">
            <x-product.view-product :data="$detailProduct" />
        </div>
        <div class="col-sm-7">
            <x-product.product-information :data="$detailProduct" />
        </div>
    </div><!--/product-details-->

    <div class="category-tab shop-details-tab"><!--category-tab-->
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li><a href="#description" data-toggle="tab">description</a></li>
                <li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade" id="description">
                <div class="description-product">
                    @if ($detailProduct->content)
                        {!! $detailProduct->content !!}
                    @else
                        <p style="text-align: center;">không có dữ liệu</p>
                    @endif
                </div>
            </div>
            <div class="tab-pane fade active in" id="reviews">
                <div class="col-sm-12">
                    <ul>
                        <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                        <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                        <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                    </ul>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis
                        aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                    <p><b>Write Your Review</b></p>

                    <form action="#">
                        <span>
                            <input type="text" placeholder="Your Name" />
                            <input type="email" placeholder="Email Address" />
                        </span>
                        <textarea name=""></textarea>
                        <b>Rating: </b> <img src="/web/assets/images/product-details/rating.png" alt="" />
                        <button type="button" class="btn btn-default pull-right">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div><!--/category-tab-->
    @if (count($recommendedProduct) > 0)
        <x-product.recommended-item :data="$recommendedProduct" />
    @endif
@endsection
@section('script')
    <script src='http://dynamicsjs.com/lib/dynamics.js'></script>
    <script src="{{ asset('vendor/modal/js/main.js') }}"></script>
@endsection
