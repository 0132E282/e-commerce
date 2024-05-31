@extends('pages.reviews.index')
@section('reviews-manager')
    <div class="d-flex justify-content-between align-items-center mb-3 ">
        <p class="fw-bold fs-5"> Số lượng: {{ $reviews->count() }}</p>
        <div class="d-flex gap-2">

        </div>
    </div>
    <div>
    </div>
    <div class="mt-3">
        <x-table.table-reviews :reviews="$reviews" />
    </div>
    <div class="mt-3">
        {{ $reviews->links() }}
    </div>
@endsection
@section('modal')
    <x-modal.modal-message id="delete_review" btnTitle="xóa" title="Xóa bình luận" content="Bạn có đồng ý xóa bình luận nầy không" />
@endsection
