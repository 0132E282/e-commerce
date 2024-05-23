@props(['method' => 'post', 'name' => '', 'custom' => false])

<form {{ $attributes }} method="POST" enctype="multipart/form-data">
    @csrf
    @method($method)
    {{ $slot }}
    @if ($custom == false)
        <x-button type="submit">Submit </x-button>
    @endif
</form>
