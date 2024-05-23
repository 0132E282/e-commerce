@extends('include/layouts/admin-layout')
@php
    $route = [
        'route' => route('admin.products.create'),
        'method' => 'post',
    ];
    if (!empty($detailProduct)) {
        $route = [
            'route' => route('admin.products.update', $detailProduct->id),
            'method' => 'put',
        ];
    }
@endphp
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="py-3 px-4">
                    <x-button link="{{ route('admin.products.index') }}">Quay lai</x-button>
                    @if (!empty($detailProduct))
                        <x-button link="{{ route('admin.products.create') }}">Tạo mới</x-button>
                    @endif
                </div>
            </div>
            @if (session()->has('message'))
                @php $message = session()->get('message'); @endphp
                <x-alert message="{{ $message['content'] }}" type="{{ $message['type'] }}" />
            @endif
            <div class="card pt-3 px-4 pb-5 ">
                <x-form.form-products :route="$route['route']" :method="$route['method']" :detailProduct="$detailProduct" />
            </div>
        </div>
    </section>
@endsection
