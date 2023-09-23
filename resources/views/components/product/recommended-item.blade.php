<h2 class="title text-center">recommended items</h2>

<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        @foreach ($recommendedProduct as $key => $product)
            @if ($key % 3 == 0)
                <div class="item {{ $key == 0 ? 'active' : '' }}">
            @endif

            <div class="col-sm-4">
                <x-product.card control="{{ false }}" :data="$product" />
            </div>
            @if ($key % 3 == 2)
    </div>
    @endif
    @endforeach
</div>
</div>
<a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
    <i class="fa fa-angle-left"></i>
</a>
<a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
    <i class="fa fa-angle-right"></i>
</a>
</div>
