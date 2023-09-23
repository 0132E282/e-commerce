@props(['method', 'action', 'link', 'name' => ''])
@if (isset($method))
    <form action="{{ $action ?? '' }}" method="post" class="d-inline-block" name="{{ $name }}">
        @csrf
        @method($method)
        <button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-primary']) }}>{{ $slot }}</button>
    </form>
@elseif(isset($link))
    <a href="{{ $link }}" {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-primary']) }}> {{ $slot }}</a>
@else
    <button {{ $attributes->merge(['type' => 'button', 'class' => 'btn btn-primary']) }}> {{ $slot }}</button>
@endif
