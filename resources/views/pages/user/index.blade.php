@extends('include.layouts.admin-layout')

@php
    $curentUrl = Request::url();
    $navProduct = [
        [
            'title' => 'tất cả',
            'url' => route('admin.users.index'),
        ],
        [
            'title' => 'tài khoản khóa',
            'url' => route('admin.products.status', ['status' => 0]),
        ],
    ];
@endphp
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
                                <label for="">Quyền </label>
                            </div>
                            <div class="col ">
                                <div class="pe-3 me-1 ">
                                    <x-select>
                                        <option value="">Chọn quyền người dùng</option>
                                    </x-select>
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
                                        <input type="text" class="form-control" name="search" placeholder="Nhập tên, email người dùng  ">
                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row col-6">
                            <x-input.input-between type="number" labde="Sản phẩm" name="products" :placeholder="['start' => 'số lượng sản phẩm tối thiểu', 'end' => 'số lượng sản phẩm tối đa']" :value="request()->products" />
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
                    @yield('user-manager')
                </div>
            </div>
        </div>
    </section>
@endsection
