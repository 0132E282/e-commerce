@extends('pages.products.index')
@section('products-manager')
    <div class="d-flex justify-content-between align-items-center ">
        <div class="">
            <p class="fw-bold fs-5"> Số lượng: {{ $products->total() }}</p>
        </div>
    </div>
    <x-table.table-products :products="$products ?? []" />
    <div class="mt-3">
        {{ $products->links() }}
    </div>
@endsection
@section('modal')
    <x-product.modal-details id="modal-details" />
    <x-modal.modal-message id="delete_message" btnTitle="xóa" title="Xóa sản phẩm" content="Bạn đồng ý xóa không" />
@endsection
