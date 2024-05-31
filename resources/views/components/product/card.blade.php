@props(['control' => true])
<div class="product-image-wrapper" style="min-height: 440px;">
    <div class="single-products">
        <div class="single-products-header">
            <img src="{{ $productItem->feature_image }}" alt="{{ $productItem->name }}" />
        </div>
        <div class="productinfo text-center ">
            <h2>{{ number_format($productItem->variations->min('price')) }} {{ $productItem->variations->min('price') <= $productItem->variations->max('price') ? '' : '-' . $productItem->variations->max('price') }} đ </h2>
            <p class="line-clamp-2" style="min-height: 40px; ">{{ Str::limit($productItem->name, 63, '...') }}</p>
            <a href="{{ route('client.shop.single', [$productItem->category, $productItem]) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
        </div>
    </div>
</div>
