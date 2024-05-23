@props(['selected', 'name' => '', 'titleOptions' => 'select', 'title' => '', 'valueTilte' => '', 'disabled' => false])

<div class="select-wrapper">
    @if ($title)
        <label for="{{ $name . '_id' }}" class="form-label">{{ $title }}</label>
    @endif
    <select {{ $attributes->class(['form-control']) }} {{ $disabled ? 'disabled' : '' }} class="" name="{{ $name }}" id="{{ $name . '_id' }}">
        {{ $slot }}
    </select>
</div>
