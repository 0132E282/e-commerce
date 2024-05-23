@extends('/include/layouts/admin-layout')
@php
    $curentUrl = Request::url();
    $navCategory = [
        [
            'title' => 'tất cả',
            'url' => route('admin.brands.index'),
        ],
        [
            'title' => 'hoạt động',
            'url' => route('admin.brands.status', ['status' => 1]),
        ],
        [
            'title' => 'ngừng bán',
            'url' => route('admin.brands.status', ['status' => 0]),
        ],
        [
            'title' => 'thùng rác',
            'url' => route('admin.brands.trash.show'),
        ],
    ];

@endphp
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @if (session()->has('message'))
                @php $message = session()->get('message'); @endphp
                <x-alert message="{{ $message['content'] }}" type="{{ $message['type'] }}" />
            @endif
            <div class="row">
                <div class="col-12">
                    <div class=" card px-3 py-4 ">
                        <form action="{{ $curentUrl }}">
                            <div class="row gap-4 ">
                                <div class="row col-6">
                                    <x-input.input-between type="number" :placeholder="['start' => 'lượt truy cập tối thiểu', 'end' => 'lượt truy vập tối đa']" labde="Lượt try cập" name="views" :value="request()->views" />
                                </div>
                                <div class="row col-6">
                                    <div class="col-2">
                                        <label for="">Tên sản phẩm</label>
                                    </div>
                                    <div class="input-group col">
                                        <input type="text" class="form-control" name="search" placeholder="Nhập tên danh mục ">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                                    </div>
                                </div>
                                <div class="row col-6">
                                    <x-input.input-between type="number" labde="Sản phẩm" name="products" :placeholder="['start' => 'số lượng sản phẩm tối thiểu', 'end' => 'số lượng sản phẩm tối đa']" :value="request()->products" />
                                </div>
                                <div class="row col-6">
                                    <x-input.input-between type="date" labde="ngày tạo" name="created" :value="request()->created" />
                                </div>
                            </div>
                            <div class="mt-3 ">
                                <button class="btn-primary btn">Tìm kiếm</button>
                                <a href="{{ $curentUrl }}" class="btn-danger  btn">Xóa bỏ</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card px-2" style="min-height: 65vh;">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center ">
                                <ul class="nav nav-underline">
                                    @foreach ($navCategory as $nav)
                                        <li class="nav-item">
                                            <a class="nav-link text-black {{ $curentUrl == $nav['url'] ? 'active border-0  ' : '' }}" aria-current="page" href="{{ $nav['url'] }}">{{ $nav['title'] }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="card-body ">
                            @yield('brands-manager')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
@section('modal')
    <x-modal.import-file id="import-file" />
    <x-modal.modal-ex-file id="modal-export-category" valueDefault="danh muc sản phẩm" />
    <x-category.modal-details id="modal-catgory" />
    <x-category.modal-coppy />
    <x-modal.modal-message id="delete_message" btnTitle="xóa" title="Xóa sản danh mục sản phẩm" content="nếu bạn xóa danh mục nầy đồng nghĩ những sản phẩm thuộc danh mục sẽ không được hoạt động" />
@endsection
