@extends('pages.slider.index')
@push('link')
    <link href="{{ asset('web/assets/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('web/assets/css/bootstrap.min.css') }}" rel="stylesheet">
@endpush

@section('slider-manage')
    <x-slider.Slider-default />
@endsection
