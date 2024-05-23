@extends('include.layouts.admin-layout')

@php
    $curentUrl = Request::url();
    $navProduct = [
        [
            'title' => 'tất cả',
            'url' => route('admin.order.index'),
        ],
        [
            'title' => 'chưa xát nhận',
            'url' => route('admin.order.index', ['status' => 'unconfirmed']),
        ],
        [
            'title' => 'đã xát nhận',
            'url' => route('admin.order.index', ['status' => 'confirmed']),
        ],
        [
            'title' => 'đã hủy',
            'url' => route('admin.order.index', ['status' => 'cancelled']),
        ],
        [
            'title' => 'đã xóa',
            'url' => route('admin.order.trash.index'),
        ],
    ];
@endphp
@push('link')
    <link rel="stylesheet" href="{{ asset('bootstrap/select2/css/select2.css') }}">
@endpush

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @if (session()->has('message'))
                    @php $message = session()->get('message'); @endphp
                    <x-alert message="{{ $message['content'] }}" type="{{ $message['type'] }}" />
                @endif
            </div>
            <div class=" card px-3 py-4 ">
                <form action="{{ $curentUrl }}">
                    <div class="row gap-4 ">
                        <div class="row col-6">
                            <div class="col-2">
                                <label for="">Khu vực </label>
                            </div>
                            <div class="col ">
                                <div class="pe-3 me-1 ">
                                    <x-select.search class="show-select-provinces" name="area">
                                        <option value="">Chọn khu vực</option>
                                    </x-select.search>
                                </div>
                            </div>
                        </div>
                        <div class="row col-6">
                            <div class="col-2">
                                <label for="">Tên người dùng</label>
                            </div>
                            <div class="col">
                                <div class="pe-3 me-1 ">
                                    <div class="input-group ">
                                        <input type="text" class="form-control" name="search" placeholder="Nhập tên, tên tài khoản, email, mã HĐ,SĐT ">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row col-6">
                            <x-input.input-between type="number" labde="Giá sản phầm" name="price" :placeholder="['start' => 'Giá sản phẩm tối thiểu', 'end' => 'Giá sản phẩm tối đa']" :value="request()->products" />
                        </div>
                        <div class="row col-6">
                            <x-input.input-between type="date" labde="ngày tạo" name="created" :value="request()->created" />
                        </div>
                    </div>
                    <div class="mt-4">
                        <button class="btn-primary btn">Tìm kiếm</button>
                        <a href="{{ $curentUrl }}" class="btn-danger  btn">Xóa bỏ</a>
                    </div>
                </form>
            </div>
            <div class="card shadow" style="min-height:60vh;">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center ">
                        <ul class="nav nav-underline">
                            @foreach ($navProduct as $nav)
                                <li class="nav-item">
                                    <a class="nav-link text-black {{ $curentUrl == $nav['url'] ? 'active border-0  ' : '' }}" aria-current="page" href="{{ $nav['url'] }}">{{ $nav['title'] }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    @yield('orders-manager')
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script src="{{ asset('bootstrap/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2()
            const api = 'https://esgoo.net/api-tinhthanh/';
            const provinces = $('.show-select-provinces');
            $.get(api + '1/0.htm', function(res) {
                const html = res.data.map(function(rel) {
                    return `<option value="${rel.name}" data-id="${rel.id}" >${rel.name} </option>`;
                });
                provinces.append(html);
            })
        });
    </script>
@endpush
