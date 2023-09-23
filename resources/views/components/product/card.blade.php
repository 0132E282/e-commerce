@props(['control' => true])
<div class="product-image-wrapper" style="min-height: 440px;">
    <div class="single-products">
        <div class="productinfo text-center">
            <img src="{{ $productItem->feature_image }}" alt="{{ $productItem->name_product }}" />
            <h2>{{ number_format($productItem->price_product) . ' đ' }}</h2>
            <p style="min-height: 40px;">{{ $productItem->name_product }}</p>
            <a href="{{ route('single-shop', ['slug' => $productItem->slug_product, 'id' => $productItem->id_product]) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
        </div>
        <div class="product-overlay">
            <div class="overlay-content">
                <h2>{{ number_format($productItem->price_product) . ' đ' }}</h2>
                <p style="min-height: 40px;">{{ $productItem->name_product }}</p>
                <a href="{{ route('single-shop', ['slug' => $productItem->slug_product, 'id' => $productItem->id_product]) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
            </div>
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
