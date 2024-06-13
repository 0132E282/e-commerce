@extends('pages.menus.index')

@section('menus-manager')
    <div class="d-flex justify-content-between align-items-center mb-3 ">
        <p class="fw-bold fs-5"> Số lượng: {{ $menus->count() ?? 0 }}</p>
        <div class="d-flex gap-2">
            <x-button :link="Route('admin.menus.create')">
                <i class="bi bi-plus-lg me-1"></i>
                Tạo mới
            </x-button>
        </div>
    </div>
    <x-table.table-menus :menus="$menus" />
@endsection
@section('modal')
    <x-modal.modal-message id="delete_message" btnTitle="xóa" title="Xóa sản phẩm" content="Bạn đồng ý xóa không" />
@endsection
