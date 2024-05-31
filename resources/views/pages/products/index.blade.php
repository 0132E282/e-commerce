@extends('include.layouts.admin-layout')

@php
    use App\Models\Brands;
    $curentUrl = Request::url();
    $brands = Brands::whereHas('products')->get();
    $navProduct = [
        [
            'title' => 'tất cả',
            'url' => route('admin.products.index'),
        ],
        [
            'title' => 'hoạt động',
            'url' => route('admin.products.index', ['status' => 'work']),
        ],
        [
            'title' => 'ngừng bán',
            'url' => route('admin.products.index', ['status' => 'stop-working']),
        ],
        [
            'title' => 'hết hàng',
            'url' => route('admin.products.sold-out'),
        ],
        [
            'title' => 'thùng rác',
            'url' => route('admin.products.trash'),
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
            <div class="card shadow p-4  ">
                <form action="{{ $curentUrl }}">
                    <div class="row gap-4 ">
                        <div class="row col-6">
                            <div class="col-2">
                                <label for="">danh mục </label>
                            </div>
                            <div class="col pe-4 me-1">
                                <x-category.select :categoryList="$categoryList" name="category" label="" />
                            </div>
                        </div>
                        <div class="row col-6">
                            <div class="col-2">
                                <label for="">Tên sản phẩm</label>
                            </div>
                            <div class="col pe-4 me-1">
                                <div class="input-group ">
                                    <input type="text" class="form-control" name="search" placeholder="Nhập tên sản phẩm, danh mục">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="row col-6">
                            <div class="col-2">
                                <label for="">Thương hiệu </label>
                            </div>
                            <div class="col pe-4 me-1">
                                <x-select name="brand" label="">
                                    <option value=""> Thương hiệu </option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}" {{ !empty($_GET['brand']) && $_GET['brand'] == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                                    @endforeach
                                </x-select>
                            </div>
                        </div>
                        <div class="row col-6">
                            <x-input.input-between type="number" labde="Giá tiền" name="price" :placeholder="['start' => 'Giá sản nhỏ nhất', 'end' => 'giá lơn nhất']" :value="request()->products" />
                        </div>
                        <div class="row col-6">
                            <x-input.input-between type="number" labde="kho hàng" name="quantity" :placeholder="['start' => 'Số lượng kho nhỏ nhất', 'end' => 'Số lượng kho lơn nhất']" :value="request()->products" />
                        </div>
                        <div class="row col-6">
                            <x-input.input-between type="date" labde="ngày tạo" name="created" :value="request()->created" />
                        </div>
                    </div>
                    <div class="mt-4 ">
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
                    @yield('products-manager')
                </div>
            </div>
        </div>
    </section>
@endsection
