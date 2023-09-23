@props(['name' , 'value' => '' , 'title' ])

<div class="input-wrapper">
    <label for="{{$name . '_id'}}" class="form-label">{{$title}}</label>
    @error($name)<p class="fs-6 py-1 text-danger">{{$message}}</p>@enderror
    <textarea name="{{$name}}" {{$attributes->merge(['type'=> "submit" , 'class'=> "form-control"])}} id="{{$name . '_id'}}" rows="3" style="resize : none; ">{{$value}}</textarea>
</div>