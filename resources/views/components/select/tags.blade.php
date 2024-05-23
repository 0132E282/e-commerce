@props(['name' => '', 'label' => '', 'placeholder' => '', 'data-tags'])
@if (!empty($label))
    <label>{{ $label }}</label>
@endif
<select {{ $attributes->class(['select2-tag  form-control m-0']) }} name="{{ $name }}" multiple="multiple" data-placeholder="{{ $placeholder }}" style="width: 100%;">
    {{ $slot }}
</select>
@error($name)
    <p class="fs-6 py-1 text-danger">{{ $message }}</p>
@enderror
