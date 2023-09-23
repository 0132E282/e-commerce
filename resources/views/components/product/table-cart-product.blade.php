<table class="table table-condensed">
    <thead>
        <tr class="cart_menu">
            <td class="image">Item</td>
            <td class="description">name</td>
            <td class="price">Price</td>
            <td class="quantity">Quantity</td>
            <td class="total">Total</td>
            <td></td>
        </tr>
    </thead>
    <tbody>
        @foreach ($dataProducts as $product)
            <tr class="table-row">
                <td class="cart_product">
                    <img src="{{ $product['feature_image'] ?? '' }}" alt="">
                </td>
                <td class="cart_description">
                    <h4><a href="{{ route('single-shop', ['id' => $product['id'], 'slug' => $product['slug_product']]) }}">{{ $product['name_product'] }}</a></h4>
                    <p>Web ID: 1089772</p>
                </td>
                <td class="cart_price">
                    <p>{{ number_format($product['price_product']) }} đ</p>
                </td>
                <td class="cart_quantity">
                    <div class="cart_quantity_button">
                        <a class="cart_quantity_up" href=""> + </a>
                        <input class="cart_quantity_input" value="{{ $product['quantity'] }}" type="text" name="quantity" value="1" autocomplete="off" size="2">
                        <a class="cart_quantity_down" href=""> - </a>
                    </div>
                </td>
                <td class="cart_total">
                    <p class="cart_total_price">{{ number_format($product['price_product'] * $product['quantity']) }} đ</p>
                </td>
                <td class="cart_delete">
                    <x-Button class="cart_quantity_delete" method="delete" action="{{ route('delete-product-cart', ['id' => $product['id'], 'slug' => $product['slug_product']]) }}">
                        <i class="fa fa-times"></i>
                    </x-Button>
                </td>
            </tr>
        @endforeach

    </tbody>
</table>
