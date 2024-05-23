@props(['name' => '', 'type' => 'text', 'value' => '', 'title' => '', 'id', 'checked' => false, 'class' => ''])
@if ($type === 'checkbox' || $type === 'radio')
    <div class="form-check p-0 {{ $class }}">
        <input {{ $checked ? 'checked' : '' }} value="{{ $value }}" class="form-check-input {{ $class }}" type="{{ $type }}" id="{{ $id ?? $name . '_id' }}" name="{{ $name }}">
        @if (isset($title) && $title != '')
            <label for="{{ $id ?? $name . '_id' }}" class="form-label">{{ $title }}</label>
        @endif
    </div>
@else
    <div class="form-check  p-0  py-2">
        @if (isset($title) && $title != '')
            <label for="{{ $id ?? '' }}" class="form-label">{{ $title }}</label>
        @endif
        <input {{ $attributes }} type="{{ $type }}" value="{{ $value ?? old($name) }}" class="form-control {{ $class }}" id="{{ $id ?? '' }}" name="{{ $name }}">
        @error($name)
            <p class="fs-6 py-1 text-danger">{{ $message }}</p>
        @enderror
    </div>
@endif
