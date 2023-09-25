@extends('/include/layouts/admin-layout')
@section('content')
    <section class="content">
        @if (session()->has('message'))
            @php $message = session()->get('message'); @endphp
            <x-alert message="{{ $message['content'] }}" type="{{ $message['type'] }}" />
        @endif
        <div class="container-fluid">
            <x-TableMenus :data="$menusList" />
        </div>
    </section>
    <!-- /.content -->
@endsection
