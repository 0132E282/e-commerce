@props(['name' => '', 'title' => '', 'class' => null])
<x-select :name="$name" class="select2 form-control {{ $class }}" :title="$title">
    {{ $slot }}
</x-select>
@error($name)
    <p class="fs-6 py-1 text-danger">{{ $message }}</p>
@enderror
