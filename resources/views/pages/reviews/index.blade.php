@extends('include.layouts.admin-layout')

@php
    $curentUrl = Request::url();
    $navProduct = [
        [
            'title' => 'tất cả',
            'url' => route('admin.reviews.index'),
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
            <div class="card shadow p-4  ">
                <form action="{{ $curentUrl }}">
                    <div class="row gap-4 ">
                        <div class="row col-6">
                            <div class="col-2">
                                <label for="">Tìm kiếm </label>
                            </div>
                            <div class="col pe-4 me-1">
                                <div class="input-group ">
                                    <input type="text" class="form-control" name="search" placeholder="Nhập tên sản phẩm, tên người dánh giá hoặt email">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                                </div>
                            </div>
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
                    @yield('reviews-manager')
                </div>
            </div>
        </div>
    </section>
@endsection
