<table class="table table-condensed">
    <thead>
        <tr class="cart_menu">
            <td colspan="2" class="image">Tên sản phẩm</td>
            <td class="price">giá</td>
            <td class="quantity">số lượng mua</td>
            <td class="total">Tổng giá</td>
            <td></td>
        </tr>
    </thead>
    <tbody>
        @if (count($dataProducts) > 0)
            @foreach ($dataProducts as $key => $product)
                <tr class="table-row" data-variant="{{ $key }}">
                    <td class="cart_product">
                        <img src="{{ $product['feature_image'] ?? '' }}" alt="">
                    </td>
                    <td class="cart_description">
                        <h4><a href="" class="line-clamp-2">{{ $product['name_product'] }}</a></h4>
                        <div style="margin-top: 5px;">
                            <span style="margin-right: 10px">màu : {{ $product['color'] ?? '' }}</span>
                            <span>kích thước : {{ $product['size'] ?? '' }}</span>
                        </div>
                    </td>
                    <td class="cart_price">
                        <p>{{ number_format($product['price_product']) }} đ</p>
                    </td>
                    <td class="cart_quantity">
                        <div class="btn-quantity" style="max-width: 100px;" data-route="{{ route('client.shop.add-cart', ['id' => $product['id_products'], 'slug' => $product['slug_product'], 'id_variant' => $key]) }}">
                            <button class="btn btn-primary btn-dow" type="button">-</button>
                            <input type="number" name="quantity" value="{{ $product['quantity'] ?? 1 }}" style="width: 100%; text-align: center" />
                            <button class="btn btn-primary btn-add" type="button">+</button>
                        </div>
                    </td>
                    <td class="cart_total">
                        <p class="cart_total_price">{{ number_format($product['price_product'] * $product['quantity']) }} đ</p>
                    </td>
                    <td class="cart_delete">
                        <x-button class="cart_quantity_delete" style="margin: 0" data-route="{{ route('client.shop.delete-cart', ['slug' => $product['slug_product'], 'id' => $key]) }}">
                            <i class="fa fa-times"></i>
                        </x-Button>
                    </td>
                </tr>
            @endforeach
        @else
            <tr style=" text-align: center; height: 400px;">
                <td colspan="5">
                    Hãy mua hàng của chúng tôi
                </td>
            </tr>
        @endif
    </tbody>
</table>
