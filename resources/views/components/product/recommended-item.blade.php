@props(['title' => ''])

<h2 class="title text-start">{{ $title }}</h2>
<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        @foreach ($recommendedProduct as $key => $product)
            @if ($key % 4 == 0)
                <div class="item {{ $key == 0 ? 'active' : '' }}">
            @endif
            <div class="col-sm-3">
                <x-product.card control="{{ false }}" :data="$product" />
            </div>
            @if ($key % 4 == 3)
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
