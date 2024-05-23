@extends('/include/layouts/admin-layout')
@section('content')
    <section class="content">
        @if (session()->has('message'))
            @php $message = session()->get('message'); @endphp
            <x-alert message="{{ $message['content'] }}" type="{{ $message['type'] }}" />
        @endif
        <div class="card p-3 ">
            <x-form.form-slider method="{{ $sliderDetails ? 'put' : 'post' }}" action=" {{ $sliderDetails ? route('admin.slider.update', $sliderDetails->id) : route('admin.slider.create') }}" :data="$sliderDetails" />
        </div>
    </section>
@endsection
