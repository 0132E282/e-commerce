@extends('/include/layouts/admin-layout')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <x-BreadcrumbAdmin />
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @if (session()->has('message'))
                    @php $message = session()->get('message'); @endphp
                    <x-Alert message="{{ $message['content'] }}" type="{{ $message['type'] }}" />
                @endif
            </div>
            <div class="row">
                <div class="col-12">

                </div>
            </div>
        </div>
    </section>
@endsection
