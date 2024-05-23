@extends('include.layouts.admin-layout')

@php
    $infolist = [
        [
            'label' => 'Email',
            'type' => 'text',
            'name' => 'email',
            'icon' => 'bi bi-envelope',
            'placeholder' => 'email@example.com',
            'location' => 'left',
        ],
        [
            'label' => 'Số điện thoại',
            'type' => 'text',
            'name' => 'phone',
            'icon' => 'bi bi-telephone-fill',
            'placeholder' => '000xxxx-xxxx-xxxx',
            'location' => 'left',
        ],
        [
            'label' => 'Địa chỉ offline',
            'type' => 'text',
            'name' => 'address',
            'icon' => 'bi bi-geo-alt-fill',
            'location' => 'left',
            'placeholder' => 'Q12,TP.HCM...',
        ],
        [
            'label' => 'Facebook',
            'type' => 'text',
            'name' => 'facebook',
            'icon' => 'bi bi-facebook',
            'placeholder' => 'nickname facebook của bạn',
            'location' => 'right',
        ],
        [
            'label' => 'Zalo',
            'type' => 'text',
            'name' => 'zalo',
            'icon' => 'bi bi-telephone-fill',
            'placeholder' => 'nickname zalo của bạn',
            'location' => 'right',
        ],
    ];
@endphp

@section('content')
    <section class="content">
        <div class="container-fluid">
            @if (session()->has('message'))
                @php $message = session()->get('message'); @endphp
                <x-alert message="{{ $message['content'] }}" type="{{ $message['type'] }}" />
            @endif
            <x-card.card-text>
                <x-slot:header>
                    <h5 class="m-0 fs-5  fw-bold ">Cài đặt thông tin liên hệ</h5>
                </x-slot:header>
                <x-slot:body>
                    <x-form :action="route('admin.settings.info')" :custom="true">
                        <div class="row">
                            <div class="col-4">
                                @foreach ($infolist as $key => $info)
                                    @php
                                        $setting = $settingInfo[$info['name']];
                                    @endphp
                                    <div class="row mb-3">
                                        <div class="col-3 d-flex justify-content-strat align-items-center ">
                                            <label class="m-0 form-label" for="">{{ $info['label'] }}</label>
                                        </div>
                                        <div class="col">
                                            <div class="input-group flex-nowrap">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="addon-wrapping"><i class="{{ $info['icon'] }}"></i></span>
                                                    <input type="text" hidden name="info[{{ $info['name'] }}][icon]" value="{{ $info['icon'] }}">
                                                </div>
                                                <input type="{{ $info['type'] }}" value="{{ $setting['value'] ?? '' }}" name="info[{{ $info['name'] }}][value]" class="form-control" placeholder="{{ $info['placeholder'] }}" aria-label="Username">
                                                <div class="input-group-text">
                                                    <div class="custom-control custom-switch" data-toggle="tooltip" data-placement="top" title="Hiển thị trên wbesite">
                                                        <input {{ !empty($setting['display']) && $setting['display'] == 'on' ? 'checked' : '' }} type="checkbox" name="info[{{ $info['name'] }}][display]" class="custom-control-input"
                                                            id="info{{ '_' . $key }}">
                                                        <input type="text" hidden name="info[{{ $info['name'] }}][location]" value="{{ $info['location'] }}">
                                                        <label class="custom-control-label" for="info{{ '_' . $key }}"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="input-group flex-nowrap mt-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="addon-wrapping"><i class="bi bi-link"></i></i></span>
                                                </div>
                                                <input type="{{ $info['type'] }}" value="{{ $setting['links'] ?? '' }}" name="info[{{ $info['name'] }}][links]" class="form-control" placeholder="Đường links liên kiết" aria-label="Username">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-12">
                                <x-button type="submit" class="mt-4">Lưu cài đặt</x-button>
                            </div>
                        </div>
                    </x-form>
                </x-slot:body>
            </x-card.card-text>
        </div>
    </section>
@endsection
