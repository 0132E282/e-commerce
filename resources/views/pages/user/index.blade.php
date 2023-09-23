@extends('/include/layouts/admin-layout')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @if (session()->has('message'))
                    @php $message = session()->get('message'); @endphp
                    <x-Alert message="{{ $message['content'] }}" type="{{ $message['type'] }}" />
                @endif
            </div>
            <div class="row">
                <div class="col-12">
                    <x-TableUser :data="$users" />
                </div>
            </div>
        </div>
    </section>
    <x-modal.modal-message title="xóa sản user" id="delete_user" content="bạn có muốn xóa không" btnTitle="đồng ý xóa" />
@endsection
