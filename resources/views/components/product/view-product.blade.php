@php
    $images = $detailProduct['description_image'];
    $images[] = $detailProduct->feature_image;
@endphp

<div class="view-product">
    @foreach ($images as $key => $image)
        <div data-target="#image_{{ $key }}" class="item {{ $key == 0 ? 'active' : '' }}">
            <img src="{{ $image }}" alt="">
        </div>
    @endforeach
</div>
<div id="similar-product" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        @foreach ($images as $key => $image)
            @if ($key % 3 == 0)
                <div class="item {{ $key == 0 ? 'active' : '' }}">
            @endif
            <a class="images_item" onclick="handleSubmitImage(event)" id="image_{{ $key }}"><img src="{{ $image }}" alt=""></a>
            @if ($key % 3 == 2 || count($images) == $key + 1)
    </div>
    @endif
    @endforeach
</div>

<a class="left item-control" href="#similar-product" data-slide="prev">
    <i class="fa fa-angle-left"></i>
</a>
<a class="right item-control" href="#similar-product" data-slide="next">
    <i class="fa fa-angle-right"></i>
</a>
</div>
<script>
    function handleSubmitImage(e) {
        e.preventDefault();
        const id = e.currentTarget.id;
        document.querySelector(`.view-product .item.active`).classList.remove("active");
        document.querySelector(`.view-product .item[data-target='#${id}']`).classList.add("active");
    }
</script>
