@extends('pages.products.index')
@section('products-manager')
    <div class="d-flex justify-content-between align-items-center mb-3 ">
        <p class="fw-bold fs-5"> Số lượng: {{ $products->total() }}</p>
        <div class="d-flex gap-2">
            <x-button :link="Route('admin.products.create')">
                <i class="bi bi-plus-lg me-1"></i>
                Tạo mới
            </x-button>

            <x-button data-target="#import-file" data-toggle="modal" data-route="{{ Route('admin.category.import') }}">
                <i class="bi bi-plus-lg me-1"></i>
                Thêm nhiều
            </x-button>
            <x-button data-target="#export-products" data-toggle="modal" class="btn-success" data-route="{{ Route('admin.products.export') }}">
                <i class="bi bi-file-earmark me-1"></i>
                Xuất File
            </x-button>
        </div>
    </div>
    <div>
        <x-table.table-products :products="$products ?? []" />
    </div>
    <div class="mt-3">
        {{ $products->links() }}
    </div>
@endsection
@section('modal')
    <x-modal.import-file id="import-file" />
    <x-modal.modal-ex-file id="export-products" valueDefault="danh sách sản phẩm" />
    <x-modal.modal-message id="delete_message" btnTitle="xóa" title="Xóa sản phẩm" content="Bạn đồng ý xóa không" />
@endsection
