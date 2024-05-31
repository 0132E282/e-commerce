@extends('/include/layouts/web-layout-default')
@section('seo')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $detailProduct->content }}">
    <meta name="author" content="">
    <title>{{ $detailProduct->name }} | E-Shopper</title>
@endsection
@section('link')
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
@endsection

@section('content')
    <div class="product-details"><!--product-details-->
        <div class="col-sm-5">
            <x-product.view-product :data="$detailProduct" />
        </div>
        <div class="col-sm-6">
            <x-product.product-information :data="$detailProduct" />
        </div>
    </div><!--/product-details-->

    <div class="category-tab shop-details-tab"><!--category-tab-->
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li><a href="#description" data-toggle="tab">Mô tả sản phẩm</a></li>
                <li class="active"><a href="#reviews" data-toggle="tab">Đánh giá ({{ $detailProduct->reviews->count() }})</a></li>
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
                    <div class="reviews-list" style="max-height: 600px; overflow-y: scroll;">
                        @foreach ($detailProduct->reviews as $review)
                            <div style="display: flex; margin-bottom: 20px;">
                                <img style="width: 80px;" src="{{ $review->user->avatar_url ?? 'https://static.vecteezy.com/system/resources/previews/000/439/863/non_2x/vector-users-icon.jpg' }} " alt="">
                                <div style="padding: 0 10px">
                                    <h4 style="margin: 0;">{{ $review->name }}</h4>
                                    <div style="margin-top: 2px;">
                                        @if (!empty($review->rating))
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $review->rating)
                                                    <i class="bi bi-star-fill "></i>
                                                @else
                                                    <i class="bi bi-star"></i>
                                                @endif
                                            @endfor
                                        @endif
                                    </div>

                                    <p style="margin-top: 10px;">{{ $review->content }}</p>
                                </div>
                            </div>
                            @if ($review->children->count() > 0)
                                <div style="margin-left: 80px; ">
                                    @foreach ($review->children as $reviews)
                                        <div style="display: flex; margin-bottom: 20px;">
                                            <img style="width: 80px;" src="{{ $review->user->avatar_url ?? 'https://static.vecteezy.com/system/resources/previews/000/439/863/non_2x/vector-users-icon.jpg' }} " alt="">
                                            <div style="padding: 0 10px">
                                                <h4 style="margin: 0;">{{ $review->name }}</h4>
                                                <p style="margin-top: 10px;">{{ $review->content }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-sm-12">
                    <x-form action="{{ route('client.reviews.create', $detailProduct) }}" id="submitFormReview" :custom="true">
                        <h4>đánh giá sản phẩm</h4>
                        <ul>
                            <li style="display: inline-block">
                                <label>
                                    <input type="checkbox" hidden name="rating" value="1">
                                    <i class="bi bi-star" style="  font-size: 25px; cursor: pointer;"></i>
                                </label>
                            </li>
                            <li style="display: inline-block">
                                <label>
                                    <input type="checkbox" hidden name="rating" value="2">
                                    <i class="bi bi-star" style="  font-size: 25px; cursor: pointer;"></i>
                                </label>
                            </li>
                            <li style="display: inline-block">
                                <label>
                                    <input type="checkbox" hidden name="rating" value="3">
                                    <i class="bi bi-star" style="  font-size: 25px; cursor: pointer; "></i>
                                </label>
                            </li>
                            <li style="display: inline-block">
                                <label>
                                    <input type="checkbox" hidden name="rating" value="4">
                                    <i class="bi bi-star" style="  font-size: 25px; cursor: pointer;"></i>
                                </label>
                            </li>
                            <li style="display: inline-block">
                                <label>
                                    <input type="checkbox" hidden name="rating" value="5">
                                    <i class="bi bi-star" style="  font-size: 25px; cursor: pointer;"></i>
                                </label>
                            </li>
                        </ul>
                        <span>
                            <input type="text" name="name" placeholder="Tên" value="{{ Auth::user()?->name ?? '' }}" />
                            <input type="email" name="email" placeholder="email" value="{{ Auth::user()?->email ?? '' }}" />
                        </span>
                        <textarea name="content" placeholder="nội dung đánh giá"></textarea>
                        <button type="submit" class="btn btn-default pull-right">
                            Đánh giá
                        </button>
                    </x-form>
                </div>
            </div>
        </div>
    </div><!--/category-tab-->
@endsection
@push('scripts')
    <script>
        $('input[name="rating"]').change(function() {
            const valueInputActive = $(this).val();
            $('input[name="rating"]').each(function() {
                if ($(this).val() <= valueInputActive) {
                    $(this).next('i').attr('class', 'bi bi-star-fill')
                } else {
                    $(this).next('i').attr('class', 'bi bi-star')
                }
            })
        });
        $('#submitFormReview').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                method: 'POST',
                data: $(this).serialize(),
                success: function(res) {
                    $('.reviews-list').append(`
                        <div style="display: flex">
                            <img style="width: 80px;" src="${res.data.avatar_url || ' https://static.vecteezy.com/system/resources/previews/000/439/863/non_2x/vector-users-icon.jpg'}" alt="">
                            <div style="padding: 0 10px">
                                <h4 style="margin: 0;">${res.data.name}</h4>
                                <p style="margin-top: 10px;">${res.data.content}</p>
                            </div>
                        </div>
                   `);
                    $(this)[0].reset();
                    toastr.success(res.message);
                }
            })
        })
    </script>
@endpush
