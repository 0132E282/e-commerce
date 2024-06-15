@props(['title' => '', 'id' => ''])

<h2 class="title text-start">{{ $title }}</h2>
<div id="{{ $id }}" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner" style="width: 100%;">
        @foreach ($recommendedProduct as $key => $product)
            @if ($key % 4 == 0)
                <div class="item {{ $key == 0 ? 'active' : '' }}" style="padding:0;">
            @endif
            <div class="col-sm-3">
                <x-product.card control="{{ false }}" :data="$product" />
            </div>
            @if ($key % 4 == 3 || $key >= count($recommendedProduct))
    </div>
    @endif
    @endforeach
</div>
</div>
<a class="left recommended-item-control" href="#{{ $id }}" data-slide="prev">
    <i class="fa fa-angle-left"></i>
</a>
<a class="right recommended-item-control" href="#{{ $id }}" data-slide="next">
    <i class="fa fa-angle-right"></i>
</a>
</div>
