@props(['action', 'method' => 'post', 'name' => '', 'custom' => false])

<form action="{{ $action }}" name="name" method="POST" enctype="multipart/form-data">
    @csrf
    @method($method)
    {{ $slot }}
    @if ($custom == false)
        <x-Button type="submit">Submit</x-Button>
    @endif
</form>
