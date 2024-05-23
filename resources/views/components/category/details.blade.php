<div class="pb-4">
    <h5><span class="fw-bold">Danh Mục</span> : {{ $categoryDetails->name ?? '' }}</h5>
    <div class="row mt-3">
        <div class="col-4">
            <h6 class="fw-bold mb-3" style="font-size: 18px;">Tổng quan </h6>
            <ul class="list-group rounded-0">
                <li class="list-group-item py-1"><span class="fw-bold ">lượt xem :</span> {{ $categoryDetails->views_count ?? '' }}</li>
                <li class="list-group-item  py-1">
                    <span class="fw-bold ">
                        đơn hàng : dev
                    </span>
                </li>
                <li class="list-group-item  py-1">
                    <span class="fw-bold ">
                        đơn hàng đã bán : dev
                    </span>
                </li>
                <li class="list-group-item  py-1">
                    <span class="fw-bold">sản phẩm :</span>
                    {{ $categoryDetails?->products->count() ?? '' }}
                </li>
                <li class="list-group-item py-1">
                    <span class="fw-bold">Ngày tạo :</span>
                    {{ $categoryDetails->created_at ?? '' }}
                </li>
                <li class="list-group-item py-1">
                    <span class="fw-bold">Cập nhập :</span>
                    {{ $categoryDetails->updated_at ?? '' }}
                </li>
            </ul>
        </div>
        <div class="col-8">
            <div class="d-flex justify-content-between  align-items-center mb-3">
                <h6 class="fw-bold m-0">Sản phẩm</h6>
                <a class="link" href="">xem thêm</a>
            </div>
            <x-table.index :tableHead="['#', 'Tên', 'Số lượng', 'Ngày tạo']">
                @if ($categoryDetails?->products->count() > 0)
                    @foreach ($categoryDetails?->products as $product)
                        <tr>
                            <th scope="row">1</th>
                            <td>{{ $product->name }}</td>
                            <td>123</td>
                            <td>{{ $product->created_at }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4" class="text-center">không có dữ liệu</td>
                    </tr>
                @endif
            </x-table.index>
        </div>
    </div>
</div>
