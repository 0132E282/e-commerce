@extends('include.layouts.admin-layout')


@section('content')
    <section class="content">
        <div class="container-fluid">
            @if (session()->has('message'))
                @php $message = session()->get('message'); @endphp
                <x-alert message="{{ $message['content'] }}" type="{{ $message['type'] }}" />
            @endif
            <div class="card p-4 ">
                <div class=" row">
                    <div class="col-9">
                        <x-button form="form-add-product" type="submit">Lưu đơn hàng</x-button>
                    </div>
                    <div class="input-group col">
                        <input type="text" class="form-control" placeholder="tìm kiếm thông tin sản phẩm" aria-describedby="basic-addon1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">@</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card p-4">
                <x-form method="put" :action="route('admin.order.add-product', ['id' => request()->id])" id="form-add-product" :custom="true">
                    <div class="row">
                        @foreach ($products as $product)
                            <div class="col-4">
                                <div class="card mb-3 overflow-hidden" data-id ="{{ $product->id }}">
                                    <div class="row ">
                                        <div class="col-3">
                                            <img class="img-fluid shadow-none " src="{{ $product->feature_image }}" alt="...">
                                        </div>
                                        <div class="col-9">
                                            <div class="card-body position-relative  py-4">
                                                <input class="form-check-input position-absolute attr-input" style="top: 0; right:10px; cursor: pointer;" type="checkbox">
                                                <h5 class="fw-bold fs-6 name-product">{{ Str::limit($product->name, 50, '...') }}</h5>
                                                <div class="row variations">
                                                    <div class="col">
                                                        <x-select name="color" disabled>
                                                            <option value="">Màu</option>
                                                            @foreach ($product->variations->pluck('color')->unique() as $color)
                                                                <option value="{{ $color }}">{{ $color }}</option>
                                                            @endforeach
                                                        </x-select>
                                                    </div>
                                                    <div class="col">
                                                        <x-select name="size" disabled>
                                                            <option value="">kích thước</option>
                                                            @foreach ($product->variations->pluck('size')->unique() as $size)
                                                                <option value="{{ $size }}">{{ $size }}</option>
                                                            @endforeach
                                                        </x-select>
                                                    </div>
                                                </div>
                                                <div class="justify-content-between align-items-center d-flex">
                                                    <p class="mt-2 price-product">{{ number_format($product->variations->min('price')) }}
                                                        {{ $product->variations->min('price') <= $product->variations->max('price') ? '' : '-' . $productItem->variations->max('price') }} đ</p>
                                                    <div style="width: 25%;">
                                                        <input style="width: 100%;" class="input-quantity" disabled type="number" value="0" min="1">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </x-form>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        $('.attr-input').on('change', function(e) {
            const productActive = $(this).closest('[data-id]');
            productActive.find('.variations select').each(function() {
                $(this).attr('disabled', false);
            });
        });
        $('.variations select').on('change', function() {
            const data = {};
            $(this).closest('.variations').find('select').each(function() {
                data[$(this).attr('name')] = $(this).val();
            });
            const productActive = $(this).closest('[data-id]');
            const urlFindVariant = @js(route('client.shop.find-variant', ['id' => ':id'])).replace(':id', productActive.data('id'));
            $.ajax({
                url: urlFindVariant,
                data: data,
                success: function(data) {
                    if (data.length == 1) {
                        var formattedPrice = data[0].price.toLocaleString('vi-VN', {
                            style: 'currency',
                            currency: 'VND'
                        });
                        productActive.find('.name-product').text(data[0].name);
                        productActive.find('.price-product').text(formattedPrice);
                        productActive.find('input.input-quantity').attr('disabled', false);
                        productActive.find('input.input-quantity').attr('name', 'orders[' + data[0].id + '][quantity]');
                        productActive.find('input.input-quantity').val(1);
                    }
                },
                error: function(err) {
                    console.log(err);
                }
            });
        });
    </script>
@endpush
