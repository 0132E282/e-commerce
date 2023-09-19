@props(['name' , 'type' => 'text' , 'value' => '' , 'placeholder'=> '' , 'title'=>'' , 'id' , 'checked' => false])
@if($type === 'checkbox' || $type === 'radio')
<div class="form-check">
    <input {{$attributes}} {{$checked ? 'checked' : ''}} class="form-check-input" type="{{$type}}" value="{{$value}}" name="{{$name}}" id="{{$id ?? $name.'_id'}}">
    @if(isset($title) && $title != '') <label for="{{$id ?? $name.'_id'}}" class="form-label">{{$title}}</label>@endif
</div>
@else
<div class="input-wrapper">
    @if(isset($title) && $title != '') <label for="{{$id ?? $name.'_id'}}" class="form-label">{{$title}}</label>@endif
    <input {{$attributes}} type="{{$type}}" value="{{$value ?? old($name)}}" class="form-control" id="{{$name.'_id'}}" name="{{$name}}" placeholder="{{$placeholder}}">
    @error($name)<p class="fs-6 py-1 text-danger">{{$message}}</p>@enderror
</div>
@endif