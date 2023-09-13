@extends('/include/layouts/admin-layout')


@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <x-BreadcrumbAdmin />
</div>
<section class="content">
    @if(session()->has('message'))
    @php $message = session()->get('message'); @endphp
    <x-alert message="{{$message['content'] }}" type="{{$message['type']}}" />
    @endif
    <div class="form">
        <x-FormSlider action="{{route('create-slider')}}" />
    </div>
</section>
@endsection