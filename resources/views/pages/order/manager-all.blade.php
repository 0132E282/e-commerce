@extends('pages.order.index')

@section('orders-manager')
    <div class="d-flex justify-content-between align-items-center mb-3 ">
        <p class="fw-bold fs-5"> Số lượng: {{ $orders->count() ?? 0 }}</p>
        <div class="d-flex gap-2">
            <x-button :link="Route('admin.menus.create')">
                <i class="bi bi-plus-lg me-1"></i>
                Tạo mới
            </x-button>
        </div>
    </div>
    <x-table.table-order :orders="$orders" />
@endsection
@section('modal')
    <x-modal.modal-message id="delete_order" btnTitle="xóa" title="Xóa đơn hàng" content="đơn hàng này sẽ đươc đưa vào thùng rác" />
@endsection
