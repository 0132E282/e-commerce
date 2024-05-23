@extends('include.layouts.admin-layout')
@php
    $curentUrl = Request::url();
    $navProduct = [
        [
            'title' => 'Tất cả',
            'url' => route('admin.slider.index'),
        ],
        [
            'title' => 'Thùng rác',
            'url' => route('admin.slider.trash.index'),
        ],
    ];
@endphp
@section('content')
    <section class="content">
        <div class="container-fluid" style="min-height: calc(100vh - 87px);">
            <div class="d-flex flex-column">
                @if (session()->has('message'))
                    @php $message = session()->get('message'); @endphp
                    <x-alert message="{{ $message['content'] }}" type="{{ $message['type'] }}" />
                @endif
                <div class="card shadow  m-0">
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
                    <div class="card-body flex-1" style="min-height: 78vh;">
                        @yield('slider-manage')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
