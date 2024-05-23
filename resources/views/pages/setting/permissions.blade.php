@extends('/include/layouts/admin-layout')
@section('content')
    <!-- Main content -->
    <section class="content">
        @if (session()->has('message'))
            @php $message = session()->get('message'); @endphp
            <x-alert message="{{ $message['content'] }}" type="{{ $message['type'] }}" />
        @endif
        <div class="container-fluid">
            <x-form.form-permission :action="route('admin.permissions.create')" method="post" />
        </div>
    </section>
    <!-- /.content -->
@endsection
