@props(['name' , 'type' => 'text' , 'value' => '' , 'placeholder'=> '' , 'title'=>''])
<div class="input-wrapper">
    @if(isset($title) && $title != '') <label for="{{$name.'_id'}}" class="form-label">{{$title}}</label>@endif
    <input {{$attributes}} type="{{$type}}" value="{{$value ?? old($name)}}" class="form-control" id="{{$name.'_id'}}" name="{{$name}}" placeholder="{{$placeholder}}">
    @error($name)<p class="fs-6 py-1 text-danger">{{$message}}</p>@enderror
</div>