@php
    $minPrice = $detailProductInfo->variations->min('price');
    $maxPrice = $detailProductInfo->variations->max('price');
@endphp
<div class="product-information"><!--/product-information-->
    <div class="header">
        <h2 class="name-product">{{ $detailProductInfo->name }}</h2>
        <div class="scores">
            <p>Lượt xem : ( {{ $detailProductInfo->views_count }} )</p>
            <ul>
                @for ($i = 1; $i <= 5; $i++)
                    <li><i class="bi bi-star-fill"></i></li>
                @endfor
            </ul>
        </div>
    </div>
    <div class="control">
        <x-form id="form-add-card" action="" method="POST" :custom="true">
            <div class="price-product">
                <p class="price-buy">{{ str_replace(',', '.', number_format($minPrice)) }} {{ $maxPrice > $minPrice ? '-' . str_replace(',', '.', number_format($minPrice)) : '' }} ₫ </p>
            </div>
            <div class="attr-products">
                <label class="attr-title">Màu</label>
                <div class="d-flex gap-2 ">
                    @foreach ($detailProductInfo->variations->pluck('color')->unique() as $color)
                        <label class="btn-checkbox btn btn-default attr-item"><input type="radio" hidden name="color" value="{{ $color }}"> {{ $color }}</label>
                    @endforeach
                </div>
            </div>
            <div class="attr-products">
                <label class="attr-title">Màu</label>
                <div class="d-flex gap-2 ">
                    @foreach ($detailProductInfo->variations->pluck('size')->unique() as $size)
                        <label class="btn-checkbox btn btn-default attr-item"><input type="radio" hidden name="size" value="{{ $size }}">{{ $size }}</label>
                    @endforeach
                </div>
            </div>
            <div class="">
                <label>số lượng: <span class="quantity-product">{{ $detailProductInfo->variations->sum('quantity') }}</span></label>
                <div class="btn-quantity">
                    <button class="btn btn-primary btn-dow" type="button">-</button>
                    <input type="number" name="quantity" value="1" />
                    <button class="btn btn-primary btn-add" type="button">+</button>
                </div>
                <button type="submit" class="btn btn-fefault cart">
                    <i class="fa fa-shopping-cart"></i>
                    Thêm giỏ hàng
                </button>
            </div>

        </x-form>
    </div>
    <p><b>Số lượng:</b> {{ $detailProductInfo->category->name }}</p>
    <p><b>Danh mục:</b> {{ $detailProductInfo->category->name }}</p>
    <p><b>Nhản hiệu:</b> {{ $detailProductInfo->brand->name }}</p>
</div><!--/product-information-->
@push('scripts')
    <script>
        function callFindVariant(data, option = {}) {
            const urlFindVariant = @js(route('client.shop.find-variant', ['id' => $detailProductInfo->id]));
            $.ajax({
                url: urlFindVariant,
                data: data,
                ...option
            });
        }
        $(document).ready(function() {

            $('.btn-quantity input').on('change', function() {
                const data = {
                    'id_variant': $('.btn-quantity').data('variable')
                };
                const input = $(this);;
                if (data.id_variant != null) {
                    callFindVariant(data, {
                        success: function(data) {
                            if (Number(input.val()) > data[0].quantity) {
                                toastr.error('só lượng kho không đủ')
                                input.val(data[0].quantity)
                            }
                        }
                    })
                } else {
                    toastr.error('bạn phải chọn thuột tính')
                    input.val(1)
                }
            });


            $('.btn-quantity .btn-add').on('click', function() {
                const data = {
                    'id_variant': $('.btn-quantity').data('variable')
                };
                const input = $(this).siblings('input[type="number"]');
                if (data.id_variant != null) {
                    callFindVariant(data, {
                        success: function(data) {
                            data[0].quantity > Number(input.val()) ? input.val(Number(input.val()) + 1) : toastr.error('Số lượng không đủ');
                        }
                    })
                } else {
                    toastr.error('bạn phải chọn thuột tính')
                }
            });
            $('.btn-quantity .btn-dow').on('click', function() {
                const input = $(this).siblings('input[type="number"]');
                if (input.val() > 0) {
                    input.val(Number(input.val()) - 1);
                }
            });
            $('#form-add-card').on('submit', function(e) {
                e.preventDefault();
                const data = {
                    'id_variant': $(this).data('variable'),
                    'quantity': $(this).find('input[name="quantity"]').val(),
                };
                $.ajax({
                    url: @js(route('client.shop.add-cart', ['id' => $detailProductInfo->id, 'slug' => $detailProductInfo->slug])),
                    data: data,
                    method: 'POST',
                    success: function(res) {
                        if (data.quantity > 0) {
                            $('.quantity-cart').text(res.data.total)
                            toastr.success('đã thêm thành công')
                        } else {
                            toastr.success('số lượng phải lơn hơn 1')
                        }

                    }
                })
            })
            $('.attr-products input:radio').on('click', function() {
                const data = {};
                data['size'] = $('.attr-item input[name="size"]:checked').val();
                data['color'] = $('.attr-item input[name="color"]:checked').val();
                callFindVariant(data, {
                    success: function(data) {
                        if (data.length == 1) {
                            var formattedPrice = data[0].price.toLocaleString('vi-VN', {
                                style: 'currency',
                                currency: 'VND'
                            });
                            $('#form-add-card').attr('data-variable', data[0].id)
                            $('.btn-quantity').attr('data-variable', data[0].id)
                            $('.price-product .price-by').text(formattedPrice);
                            $('.name-product').text(data[0].name);
                            $('.quantity-product').text(data[0].quantity);
                            $('.btn-quantity input[name="quantity"]').val(1)
                        }

                    }
                });
            });
        });
    </script>
@endpush
