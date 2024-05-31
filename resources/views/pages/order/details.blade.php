@extends('include.layouts.admin-layout')
@php
    $address = !empty($bill->address) ? json_decode($bill->address, true) : [];
@endphp
@section('content')
    <section class="content">
        <div class="container-fluid">
            @if (session()->has('message'))
                @php $message = session()->get('message'); @endphp
                <x-alert message="{{ $message['content'] }}" type="{{ $message['type'] }}" />
            @endif
            <div class="card shadow p-4">
                <div class="row">
                    <div class="col-6">
                        <h4 class="mt-3 fw-bold fs-5">Thông tin Khách hàng</h4>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <span class="fw-bold ">Tên khách hàng : </span>
                                {{ $bill->fullname }}
                            </li>
                            <li class="list-group-item">
                                <span class="fw-bold ">tài khoản :</span>
                                {{ $bill->user?->email ?? 'NaN' }}
                            </li>
                            <li class="list-group-item">
                                <span class="fw-bold ">SĐT khách hàng :</span>
                                {{ $bill->phone }}
                            </li>
                            <li class="list-group-item">
                                <span class="fw-bold ">mail :</span>
                                {{ $bill->email }}
                            </li>
                            <li class="list-group-item">
                                <span class="fw-bold ">Khu vực : </span>
                                {{ $address['provinces'] ?? 'NaN' }}
                            </li>
                        </ul>
                    </div>
                    <div class="col-6">
                        <h4 class="mt-3 fw-bold fs-5">Thông tin đặt hàng</h4>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <span class="fw-bold ">Địa chỉ giao hàng : </span>
                                {{ is_array($address) ? join(' , ', $address) : 'NaN' }}
                            </li>
                            <li class="list-group-item">
                                <span class="fw-bold ">ngày đặt hàng :</span>
                                {{ $bill->created_at }}
                            </li>
                            <li class="list-group-item">
                                <span class="fw-bold ">phương thức :</span>
                                {{ $bill->payment ?? 'nhận hàng khi thanh toán' }}
                            </li>
                            <li class="list-group-item">
                                <span class="fw-bold ">Thanh toán : </span>
                                {{ $bill->paid_at ?? 'Chưa thanh toán' }}
                            </li>
                            <li class="list-group-item">
                                <span class="fw-bold ">Trạng thái :</span>
                                {{ $bill->status !== null ? ($bill->status === 1 ? 'đã xát nhận' : 'đã hủy') : 'chưa xát nhận' }} đơn hàng
                            </li>
                        </ul>
                    </div>
                    <div class="col-6">
                        <p class="mt-3 fs-5 mb-0"> <span class="fw-bold ">Nghi chú :</span> {{ $bill->note }}</p>
                    </div>
                </div>
            </div>
            <div class="card shadow p-4 ">
                <div style="min-height: 45vh;">
                    <div class="mb-3 d-flex justify-content-between ">
                        <div>
                            <x-button :link="route('admin.order.index')"> quay lại </x-button>
                        </div>
                        <div>
                            <x-button :link="route('admin.order.add-product', ['id' => $bill->id])"> Thêm sản phẩm </x-button>
                            <x-button> Thêm vochar</x-button>
                            <x-button form="update-order-item" type="submit"> cập nhập</x-button>
                        </div>
                    </div>
                    <x-table.table-menu-item :bill="$bill" />
                </div>
                <div class="py-2 row">
                    <div class="col">
                        <span>Tổng số lương :</span>
                        {{ $bill->order_items->sum('quantity') }}
                    </div>
                    <div class="col">
                        <span>phí giao hàng :</span>0
                    </div>
                    <div class="col">
                        <span>Giá giảm :</span>
                        0
                    </div>
                    <div class="col">
                        <span>Tổng giá :</span>
                        {{ number_format(
                            $bill->order_items->sum(function ($item) {
                                return $item->quantity * $item->price;
                            }),
                        ) }}
                    </div>
                    <div class="col-4 text-end">
                        <x-button>
                            <i class="bi bi-file-earmark"></i>
                            In hóa đơn
                        </x-button>
                        @if ($bill->status !== 0 || $bill->status === null)
                            <x-button method="patch" :action="route('admin.order.update-status', ['id' => $bill->id, 'status' => 0])" class="btn-danger ">Hủy đơn </x-button>
                        @endif
                        @if ($bill->status !== 1)
                            <x-button method="patch" :action="route('admin.order.update-status', ['id' => $bill->id, 'status' => 1])" class="btn-success"> xát nhận đơn </x-button>
                        @endif
                        <x-button :link="!empty($orderBefore->id) ? route('admin.order.detail', ['id' => $orderBefore->id]) : ''"> Trước đó</x-button>
                        <x-button :link="!empty($orderNext->id) ? route('admin.order.detail', ['id' => $orderNext->id]) : ''"> tiếp theo</x-button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('modal')
    <x-modal.modal-message id="delete_message" btnTitle="xóa" title="Xóa sản phẩm" content="Bạn đồng ý xóa không" />
@endsection
