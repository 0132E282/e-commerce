@extends('/include/layouts/admin-layout')
@php
    $action = route('admin.category.create');
    $method = 'post';
    if (!empty($detailCategory)) {
        $action = route('admin.category.update', $detailCategory->id);
        $method = 'put';
    }
@endphp
@section('content')
    <!-- Main content -->
    <section class="content">
        @if (session()->has('message'))
            @php $message = session()->get('message'); @endphp
            <x-alert message="{{ $message['content'] }}" type="{{ $message['type'] }}" />
        @endif
        <div class="container-fluid">
            <x-form.form-category action="{{ $action }}" method="{{ $method }}" :detailCategory="$detailCategory" />
        </div>
    </section>
    <!-- /.content -->
@endsection
