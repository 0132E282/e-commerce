@props(['name'=>''])

<select class="form-select" name="{{$name}}">
    <option value="0">danh mục cha</option>
    {!!$view!!}
</select>