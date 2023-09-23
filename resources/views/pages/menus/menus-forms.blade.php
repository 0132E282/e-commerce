@extends('/include/layouts/admin-layout')
@section('content')
    <!-- Main content -->
    <section class="content">
        @if (session()->has('message'))
            @php $message = session()->get('message'); @endphp
            <x-alert message="{{ $message['content'] }}" type="{{ $message['type'] }}" />
        @endif
        <div class="container-fluid">
            <x-FormMenus :detailsMenus="$form['data']" action="{{ $form['route'] }}" method=" {{ $form['method'] }}" />
        </div>
    </section>
    <!-- /.content -->
@endsection
