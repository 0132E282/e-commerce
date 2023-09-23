@props(['selected', 'name' => '', 'titleOptions' => 'select', 'title' => '', 'valueTilte' => '', 'disabled' => false])

<div class="select-wrapper">
    <label for="{{ $name . '_id' }}" class="form-label">{{ $title }}</label>
    <select {{ $attributes }} {{ $disabled ? 'disabled' : '' }} class="form-control" name="{{ $name }}" id="{{ $name . '_id' }}">
        <option value="{{ $valueTilte }}">{{ $titleOptions }}</option>
        @foreach ($dataSelect as $value)
            <option {{ $value['selected'] ?? '' }} value="{{ $value['value'] }}">{{ $value['title'] }}</option>
        @endforeach
    </select>
</div>
