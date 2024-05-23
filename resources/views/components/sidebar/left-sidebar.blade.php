<div class="left-sidebar">
    <x-category-products class="category-products" :categoryList="$categoryList" />
    <div class="brands_products"><!--brands_products-->
        <h2>Nhản hiệu</h2>
        <div class="brands-name">
            <ul class="nav nav-pills nav-stacked">
                @foreach ($brands as $brand)
                    <li><a href="{{ $brand->id }}"> <span class="pull-right">({{ $brand->products->count() }})</span>{{ $brand->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="shipping text-center">
        <img src="/web/assets/images/home/shipping.jpg" alt="" />
    </div>
</div>
