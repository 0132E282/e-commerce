@extends('include.layouts.admin-layout')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card shadow p-4">
                <div>
                    <x-button :link="route('admin.reviews.index')">Quay lại</x-button>
                </div>
            </div>
            @if (session()->has('message'))
                @php $message = session()->get('message'); @endphp
                <x-alert message="{{ $message['content'] }}" type="{{ $message['type'] }}" />
            @endif
            <div class="card shadow p-4">
                <x-card.card-reviews :review="$review" />
                @if ($review->children->count() > 0)
                    <div class="ms-5">
                        @foreach ($review->children as $review)
                            <x-card.card-reviews :review="$review" />
                        @endforeach
                    </div>
                @endif
                <x-form :action="route('admin.reviews.reply', $review)" class="mt-2" :custom="true">
                    <div class="input-group input-group-sm mb-0">
                        <input class="form-control form-control-sm" name="content" placeholder="Response">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-danger px-3">gửi</button>
                        </div>
                    </div>
                </x-form>
            </div>
        </div>
    </section>
@endsection
@section('modal')
    <x-modal.modal-message id="delete_review" btnTitle="xóa" title="Xóa bình luận" content="Bạn có đồng ý xóa bình luận nầy không" />
@endsection
