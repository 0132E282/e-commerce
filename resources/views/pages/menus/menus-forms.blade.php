@extends('include.layouts.admin-layout')
@php
    $route = empty($menu) ? route('admin.menus.create') : route('admin.menus.update', ['id' => $menu->id]);
    $method = empty($menu) ? 'post' : 'put';
@endphp
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @if (session()->has('message'))
                @php $message = session()->get('message'); @endphp
                <x-alert message="{{ $message['content'] }}" type="{{ $message['type'] }}" />
            @endif
            <div class="card py-2 px-3">
                <div class="d-flex justify-content-between ">
                    <button class="btn btn-primary">quay lại</button>
                </div>
            </div>
            <div class="card shadow">
                <div class="card-header">
                    <h5 class="fs-5 fw-normal  m-0">Tạo menus sản phẩm</h5>
                </div>
                <div class="card-body">
                    <x-form.form-menus :menu="$menu" :action="$route" :method="$method" />
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
