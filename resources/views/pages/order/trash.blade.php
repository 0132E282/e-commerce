@extends('pages.order.index')

@section('orders-manager')
    <div class="d-flex justify-content-between align-items-center mb-3 ">
        <p class="fw-bold fs-5"> Số lượng: {{ $orders->count() ?? 0 }}</p>
        <div class="d-flex gap-2">

        </div>
    </div>
    <x-table.table-order :orders="$orders" />
@endsection
@section('modal')
    <x-modal.modal-message id="delete_order" btnTitle="xóa" title="Xóa đơn hàng" content="đơn hàng này sẽ đươc đưa vào thùng rác" />
    <x-modal.modal-message id="restore_order" btnTitle="khôi phục" title="Khôi phục đơn hàng" content="bạn có đồng ý khôi phục đơn hàng này không" />
@endsection
