<div class="left-sidebar">
    <x-category-products class="category-products" :categoryList="$categoryList" />
    <div class="brands_products"><!--brands_products-->
        <h2>Nhản hiệu</h2>
        <div class="brands-name">
            <ul class="nav nav-pills nav-stacked">
                <li><a href="{{ route('client.shop.view') }}"> <span class="pull-right"></span>tất cả</a></li>
                @foreach ($brands as $brand)
                    <li><a href="{{ route('client.shop.brand', $brand) }}"> <span class="pull-right">({{ $brand->products->count() }})</span>{{ $brand->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    {{-- <div class="price-range"><!--price-range-->
        <h2>Giá sản phẩm</h2>
        <div class="well text-center">
            <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2"><br />
            <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
        </div>
    </div> --}}
</div>
