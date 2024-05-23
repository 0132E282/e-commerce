@extends('include.layouts.admin-layout')

@section('content')
    <section class="content">
        <div class="container-fluid">
            @if (session()->has('message'))
                @php $message = session()->get('message'); @endphp
                <x-alert message="{{ $message['content'] }}" type="{{ $message['type'] }}" />
            @endif
            <div class="card ">
                <div class="card-header">
                    <h5 class="fs-5 fw-bold  m-0 ">Cài đặt hệ thống</h5>
                </div>
                <div class="card-body ">
                    <x-form.form-setting :settingSystem="$settingSystem" />
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        $('.input-image').find('input').on('change', function(e) {
            const urlPath = URL.createObjectURL(e.target.files[0]);
            $(this).parent().find('.load').html('<img class="w-100" src="' + urlPath + '"/>');
        })
    </script>
@endpush
