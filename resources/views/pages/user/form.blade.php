@extends('/include/layouts/admin-layout')


@section('content')
    <section class="content">
        @if (session()->has('message'))
            @php $message = session()->get('message'); @endphp
            <x-alert message="{{ $message['content'] }}" type="{{ $message['type'] }}" />
        @endif
        <div class="form">
            <x-FormUser action="{{ $form['route'] }}" :data="$form['data']" method="{{ $form['method'] }}" />
        </div>
    </section>
@endsection
