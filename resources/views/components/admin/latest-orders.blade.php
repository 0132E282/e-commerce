@props(['title' => ''])

<div class="card">
    <div class="card-header border-0">
        <h3 class="card-title">Products</h3>
        <div class="card-tools">
            <a href="#" class="btn btn-tool btn-sm">
                <i class="fas fa-download"></i>
            </a>
            <a href="#" class="btn btn-tool btn-sm">
                <i class="fas fa-bars"></i>
            </a>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <x-table.index :columnNames="['Mã ĐH', 'sản phẩm', 'trạng thái', 'ngày tạo']" :dataTable="$dataOrders">
                @foreach ($dataOrders as $order)
                    @php
                        $key = array_search($order->status, array_column($statusList, 'title'), true);
                    @endphp
                    @foreach ($order->orderItems as $orderItems)
                        <tr>
                            <td><a href="pages/examples/invoice.html">{{ $order->id }}</a></td>
                            <td>{{ $orderItems->products->name_product }}</td>
                            <td><span class="badge badge-{{ $statusList[$key]['bg'] }} ">{{ $statusList[$key]['title'] }}</span></td>
                            <td>
                                <div class="sparkbar" data-color="#00a65a" data-height="20">{{ date('Y/m/d', strtotime($order->created_at)) }}</div>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </x-table.index>
        </div>
        <!-- /.table-responsive -->
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
        <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
        <a href="{{ route('order.index') }}" class="btn btn-sm btn-secondary float-right">xem tất cả</a>
    </div>
</div>
