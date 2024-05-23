@props(['control' => true])
<div class="product-image-wrapper" style="min-height: 440px;">
    <div class="single-products">
        <div class="single-products-header">
            <img src="{{ $productItem->feature_image }}" alt="{{ $productItem->name }}" />
        </div>
        <div class="productinfo text-center ">
            <h2>{{ number_format($productItem->variations->min('price')) }} {{ $productItem->variations->min('price') <= $productItem->variations->max('price') ? '' : '-' . $productItem->variations->max('price') }} đ </h2>
            <p class="line-clamp-2" style="min-height: 40px; ">{{ Str::limit($productItem->name, 63, '...') }}</p>
            <a href="{{ route('client.shop.single', ['slug' => $productItem->slug, 'id' => $productItem->id]) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
        </div>
    </div>
    @if ($control == true)
        <div class="choose">
            <ul class="nav nav-pills nav-justified">
                <li><a href="#"><i class="fa fa-plus-square"></i>yêu thích</a></li>
                <li><a href="#"><i class="fa fa-plus-square"></i>so sánh</a></li>
            </ul>
        </div>
    @endif
</div>
