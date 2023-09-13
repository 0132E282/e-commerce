@extends('/include/layouts/admin-layout')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <x-BreadcrumbAdmin :value="$detailCategory" />
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    @if(session()->has('message'))
    @php $message = session()->get('message'); @endphp
    <x-alert message="{{$message['content'] }}" type="{{$message['type']}}" />
    @endif
    <div class="container-fluid">
        <x-FormCategory :detailCategory="$detailCategory" />
    </div>
</section>
<!-- /.content -->
@endsection