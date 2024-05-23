@props(['method' => 'post', 'action', 'link', 'name' => '', 'enctype' => ''])
@if (isset($action))
    <form action="{{ $action ?? '' }}" method="post" class="d-inline-block mb-0" name="{{ $name }}" enctype='{{ $enctype }}' {{ $attributes }}>
        @csrf
        @method($method)
        <button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-primary']) }}>{{ $slot }}</button>
    </form>
@elseif(isset($link))
    <a href="{{ $link }}" {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-primary']) }} {{ $attributes }}> {{ $slot }}</a>
@else
    <button {{ $attributes->merge(['type' => 'button', 'class' => 'btn btn-primary']) }} {{ $attributes }}> {{ $slot }}</button>
@endif
