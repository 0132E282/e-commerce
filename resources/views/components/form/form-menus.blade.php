@props(['action', 'method' => 'post'])
@php
    $location = [
        [
            'value' => 'top',
            'id' => 'locaion-top',
            'label' => 'Top',
        ],
        [
            'value' => 'bottom',
            'id' => 'locaion-bottom',
            'label' => 'bottom',
        ],
    ];
@endphp
<x-form action="{{ $action }}" method="{{ $method }}">
    <div class="mb-3">
        <x-input name="name" title="tên menus" value="{{ $menu->name ?? '' }}" placeholder="nhập thông tin" />
    </div>
    <div class="mb-3">
        <label for="">Vị trí menu</label>
        @foreach ($location as $location)
            <div class="form-check">
                <input class="form-check-input" type="radio" name="location" {{ !empty($menu->location) && $location['value'] == $menu->location ? 'checked' : '' }} value="{{ $location['value'] }}" id=" {{ $location['id'] }}">
                <label class="form-check-label" for="loacion-top">
                    {{ $location['label'] }}
                </label>
            </div>
        @endforeach
    </div>
    <div class="mb-3">
        <x-textarea-form name="description" title="mô tả menu" :value="$menu->description ?? ''" />
    </div>
</x-form>
