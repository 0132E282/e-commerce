@props(['name' => '', 'title' => '', 'class' => null])
<x-select :name="$name" class="select2 form-control {{ $class }}" :title="$title">
    {{ $slot }}
</x-select>
