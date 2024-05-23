<div>
    <h4 class="fs-5 mb-4"> <span class="fw-bold">Sản phẩm : </span>{{ $product->name ?? '' }}</h4>
    <div class="row">
        <div class="col-4">
            <ul class="list-group rounded-0 ">
                <li class="py-1 list-group-item">Kho hàng : {{ $product?->variations->sum('quantity') ?? '' }}</li>
                <li class="py-1 list-group-item">reivew : {{ $product?->views_count ?? '' }}</li>
                <li class="py-1 list-group-item">Danh mục : {{ $product?->category->name ?? '' }}</li>
                <li class="py-1 list-group-item">Đơn hàng : {{ 0 }} </li>
                <li class="py-1 list-group-item">Đã bán : {{ 0 }}</li>
                <li class="py-1 list-group-item">Ngày tạo : {{ $product?->created_at ?? '' }}</li>
                <li class="py-1 list-group-item">Cập nhập : {{ $product?->updated_at ?? '' }}</li>
            </ul>
        </div>
        <div class="col">
            <div class="mb-4">
                @if (!empty($product->feature_image))
                    <h4 class="fw-bold fs-6">Ảnh chi tiêt sản phẩm</h4>
                    <img class="img-thumbnail" src="{{ $product->feature_image ?? '' }}" alt="" style="width: 60px;">
                @endif
            </div>
            <div class="mb-4 mt-2">
                @if (!empty($product->description_image))
                    <h4 class="fw-bold fs-6">Ảnh ảnh mô tả sản phẩm</h4>
                    <div class="d-flex justify-content-start align-items-center gap-2">
                        @foreach ($product->description_image as $image)
                            <img class="img-thumbnail" src="{{ $image ?? '' }}" alt="" style="width: 60px;">
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

    </div>
    <div class="row">

        <div class="col">
            <div class="h-100" style="max-height: 240px;  overflow: scroll; ">
                <x-table :tableHead="['#', 'màu', 'kích thước', 'số lượng', 'giá', 'giá giảm']">
                    @if ($product?->variations->count() > 0)
                        @foreach ($product?->variations as $key => $variation)
                            <tr>
                                <td> {{ ++$key }}</td>
                                <td>{{ $variation->color }} </td>
                                <td>{{ $variation->size }} </td>
                                <td>{{ $variation->quantity }} </td>
                                <td>{{ $variation->price }} </td>
                                <td>{{ $variation->reduced_price }} </td>
                            </tr>
                        @endforeach
                    @endif
                </x-table>
            </div>
        </div>
        <div class="col-12">

            <div class="h-100 mt-4" style="min-height: 40vh; max-height: 100%;">
                <h5 class="fw-bold fs-6 mb-2">Mô tả sản phẩm</h5>
                {!! $product->content ?? '' !!}
            </div>
        </div>
    </div>
</div>
