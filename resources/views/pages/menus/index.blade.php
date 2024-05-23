@extends('include.layouts.admin-layout')
@php
    $curentUrl = Request::url();
    $navProduct = [
        [
            'title' => 'tất cả',
            'url' => route('admin.menus.index'),
        ],
        [
            'title' => 'thùng rác',
            'url' => route('admin.menus.trash.index'),
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
            <div class="card shadow" style="min-height:80vh;">
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
                    @yield('menus-manager')
                </div>
            </div>
        </div>
    </section>
@endsection
