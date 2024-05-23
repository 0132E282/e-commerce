@extends('include/layouts/admin-layout')
@php
    $route = empty($user) ? route('admin.users.create') : route('admin.users.update', ['id' => $user]);
    $method = empty($user) ? 'post' : 'put';
@endphp

@section('content')
    <section class="content">
        <div class="container-md">
            @if (session()->has('message'))
                @php $message = session()->get('message'); @endphp
                <x-alert message="{{ $message['content'] }}" type="{{ $message['type'] }}" />
            @endif
            <div class="card">
                <div class="d-flex py-2  px-3 justify-content-between align-content-center ">
                    <div class="">
                        <x-button>
                            Quay tại
                        </x-button>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="fw-bold m-0 fs-5">Tạo tài khoản người dùng</h4>
                </div>
                <div class="card-body" style="min-height: 73vh;">
                    <x-form.form-user :user="$user" :action="$route" :method="$method" />
                </div>
            </div>
        </div>
    </section>
@endsection
