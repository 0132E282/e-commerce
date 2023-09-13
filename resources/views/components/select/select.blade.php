@props(['selected' , 'name' => '' , 'titleOptions' => 'select' , 'title' => 'Select'])

<div>
    <label for="{{$name . '_id'}}" class="form-label">{{$title}}</label>
    <select class="form-control" name="{{$name}}" id="{{$name . '_id'}}">
        <option value="0">{{$titleOptions}}</option>
        @foreach($dataSelect as $value)
        <option {{$value['selected'] }} value="{{$value['value']}}">{{$value['title']}}</option>
        @endforeach
    </select>
</div>