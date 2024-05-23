@php
    $tableHead = [
        'mã',
        [
            'col_name' => 'tên người nhận',
            'order' => 'name',
        ],
        [
            'col_name' => 'tài khoản',
            'order' => 'users',
        ],
        [
            'col_name' => 'điện thoại',
            'order' => 'phone',
        ],
        [
            'col_name' => 'email',
            'order' => 'email',
        ],
        [
            'col_name' => 'tổng giá',
            'order' => 'total_price',
        ],
        [
            'col_name' => 'trạng thái',
            'order' => 'status',
        ],
        [
            'col_name' => 'phương thức',
            'order' => 'payment',
        ],
        [
            'col_name' => 'thanh toán',
            'order' => 'pay',
        ],
        [
            'col_name' => 'khu vực',
            'order' => 'area',
        ],
        [
            'col_name' => 'ngày tạo',
            'order' => 'created',
        ],
        '',
    ];
@endphp

<x-Table :tableHead="$tableHead">
    @if ($orders->count() > 0)
        @foreach ($orders as $order)
            @php
                $address = json_decode($order->address, true);
                $toal_price = $order->order_items->sum(fn($item) => $item->quantity * $item->price);
            @endphp
            <tr>
                <td><span class="fw-bold ">#{{ $order->trading_code }}</span></td>
                <td>{{ $order->fullname }}</td>
                <td>{{ $order->user->name ?? 'NaN' }}</td>
                <td>{{ $order->phone }}</td>
                <td>{{ $order->email }}</td>
                <td>{{ number_format($toal_price) }} đ</td>
                <td> {{ $order->status != null ? ($order->status == 1 ? 'đã xát nhận' : 'đã hủy') : 'chưa xát nhận' }}</td>
                <td> @switch($order->payment)
                        @case('VN_PAY')
                            vnpay
                        @break

                        @case('MOMO')
                            MOMO
                        @break

                        @default
                            nhận hàng
                    @endswitch
                </td>
                <td> {{ isset($order->paid_at) ? 'đã thanh toán' : 'chưa thanh toán' }}</td>
                <td>{{ $address['provinces'] ?? 'NaN' }}</td>
                <td>{{ $order->created_at }}</td>
                <td>
                    <div class="dropdown dropleft">
                        <button class="btn dropdown-toggle " type="button" data-toggle="dropdown" aria-expanded="true">
                            <i class="bi bi-three-dots-vertical"></i>
                        </button>
                        <div class="dropdown-menu ">
                            @if (Route::currentRouteName() === 'admin.order.trash.index')
                                <x-button class="dropdown-item" :action="route('admin.order.trash.restore', $order)" method="patch">
                                    <span class="me-2"><i class="bi bi-arrow-clockwise"></i></span> khôi phục
                                </x-button>
                                <a class="dropdown-item" href="javasrcip(0)" data-method="delete" data-route="{{ route('admin.order.trash.destroy', $order->id) }}" data-toggle="modal" data-target="#delete_order">
                                    <span class="me-2"> <i class="bi bi-trash-fill"></i></span> xóa vĩnh viễn
                                </a>
                            @else
                                <a class="dropdown-item" href="{{ route('admin.order.detail', ['id' => $order->id]) }}">
                                    <span class="me-2"> <i class="bi bi-eye"></i> </span>Xem chi tiết
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.order.update-customer', ['id' => $order->id]) }}">
                                    <span class="me-2"><i class="bi bi-pencil-square"></i></span> chỉnh sửa
                                </a>
                                <a class="dropdown-item" href="javasrcip(0)" data-method="delete" data-route="{{ route('admin.order.delete', $order->id) }}" data-toggle="modal" data-target="#delete_order">
                                    <span class="me-2"> <i class="bi bi-trash-fill"></i></span> xóa đơn
                                </a>
                            @endif

                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="{{ count($tableHead) }}" class="border-0 ">
                <div class="py-5 d-flex flex-column  justify-content-center  align-items-center w-100">
                    <div class="mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-receipt-cutoff" viewBox="0 0 16 16">
                            <path
                                d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5M11.5 4a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1z" />
                            <path
                                d="M2.354.646a.5.5 0 0 0-.801.13l-.5 1A.5.5 0 0 0 1 2v13H.5a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1H15V2a.5.5 0 0 0-.053-.224l-.5-1a.5.5 0 0 0-.8-.13L13 1.293l-.646-.647a.5.5 0 0 0-.708 0L11 1.293l-.646-.647a.5.5 0 0 0-.708 0L9 1.293 8.354.646a.5.5 0 0 0-.708 0L7 1.293 6.354.646a.5.5 0 0 0-.708 0L5 1.293 4.354.646a.5.5 0 0 0-.708 0L3 1.293zm-.217 1.198.51.51a.5.5 0 0 0 .707 0L4 1.707l.646.647a.5.5 0 0 0 .708 0L6 1.707l.646.647a.5.5 0 0 0 .708 0L8 1.707l.646.647a.5.5 0 0 0 .708 0L10 1.707l.646.647a.5.5 0 0 0 .708 0L12 1.707l.646.647a.5.5 0 0 0 .708 0l.509-.51.137.274V15H2V2.118z" />
                        </svg>
                    </div>
                    <p class="m-0 fw-bold text-center  ">Không có dữ liệu</p>
                </div>
            </td>
        </tr>
    @endif

</x-Table>
