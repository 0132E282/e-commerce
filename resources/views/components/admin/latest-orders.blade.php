@props(['title' => ''])
<div class="card">
    <div class="card-header border-0">
        <h3 class="card-title">Sản phẩm bán chậy nhất</h3>
        <div class="card-tools">

        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <x-table.index :tableHead="['sản phẩm', 'danh mục', 'đã bán', 'tổng tiền']">
                @foreach ($products as $product)
                    <tr>
                        <td class="overflow-hidden" style=" max-width: 200px; text-wrap: nowrap;text-overflow: ellipsis;">
                            <div class="d-flex">
                                <img src="{{ $product->feature_image }}" alt="" style="max-width: 60px;" class="img-thumbnail">
                                <p class="ms-2"> {{ $product->name }}</p>
                            </div>
                        </td>
                        <td class="overflow-hidden" style="max-width: 200px;text-wrap: nowrap;text-overflow: ellipsis;">{{ $product->category->name }}</td>
                        <td class="overflow-hidden" style="  max-width: 200px;text-wrap: nowrap;text-overflow: ellipsis;">{{ $product->total_quantity_order }}</td>
                        <td class="overflow-hidden" style=" max-width: 200px; text-wrap: nowrap; text-overflow: ellipsis;">{{ $product->total_price_order }}</td>
                    </tr>
                @endforeach
            </x-table.index>
        </div>
        <!-- /.table-responsive -->
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
        <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-secondary float-right">xem tất cả</a>
    </div>
</div>
