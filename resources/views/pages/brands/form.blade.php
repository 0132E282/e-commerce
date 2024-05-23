@extends('include.layouts.admin-layout')

@php
    $action = empty($brand) ? route('admin.brands.create') : route('admin.brands.update', $brand->id);
    $method = empty($brand) ? 'post' : 'put';

@endphp


@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card py-3 px-4">
                <div class="me-auto">
                    <x-button link="{{ route('admin.brands.index') }}">Quay lai</x-button>
                    @if (!empty($brand))
                        <x-button link="{{ route('admin.brands.create') }}">Tạo mới</x-button>
                    @endif
                </div>
            </div>
            @if (session()->has('message'))
                @php $message = session()->get('message'); @endphp
                <x-alert message="{{ $message['content'] }}" type="{{ $message['type'] }}" />
            @endif
            <div class="card p-4 ">
                <div class="row">
                    <div class="col">
                        <x-form.form-brands :action="$action" :brand="$brand" :method="$method" />
                    </div>
                    <div class="col"></div>
                </div>
            </div>
        </div>
    </section>
@endsection
