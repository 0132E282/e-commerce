<div class="product-information"><!--/product-information-->
    <div class="header">
        <img src="/web/assets/images/product-details/new.jpg" class="newarrival" alt="" />
        <h2>{{ $detailProductInfo->name_product }}</h2>
        <div class="scores">
            <p>views : ( {{ $detailProductInfo->views_count }} )</p>
            <ul>
                <li><i class="bi bi-star-fill"></i></li>
                <li><i class="bi bi-star-fill"></i></li>
                <li><i class="bi bi-star-fill"></i></li>
                <li><i class="bi bi-star-fill"></i></li>
                <li><i class="bi bi-star-fill"></i></li>
            </ul>
        </div>
    </div>
    <div class="control">
        <x-form name="from_create" custom="{{ true }}" action="{{ route('add-cart-shop', ['slug' => $detailProductInfo->slug_product, 'id' => $detailProductInfo->id_product]) }} " method="POST">
            <p>{{ number_format($detailProductInfo->price_product) . ' đ' }} </p>
            <label>Quantity:</label>
            <input type="text" name="quantity" value="1" />
            <button type="submit" class="btn btn-fefault cart">
                <i class="fa fa-shopping-cart"></i>
                Add to cart
            </button>
        </x-form>
    </div>
    <p><b>Availability:</b> In Stock</p>
    <p><b>Condition:</b> New</p>
    <p><b>Brand:</b> E-SHOPPER</p>
    <a href=""><img src="/web/assets/images/product-details/share.png" class="share img-responsive" alt="" /></a>
</div><!--/product-information-->
