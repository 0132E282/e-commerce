@props(['name' , 'title' => '' ])

<div class="select_wrapper">
    <label for="{{$name . '_id'}}" class="form-label">{{$title}}</label>
    <select class="form-control tagSl-2" multiple="multiple" name="{{$name}}">
        @foreach($dataTags as $item)
        @if($item['selected'] == true)
        <option value="{{$item['value']}}" selected="selected">{{$item['title']}}</option>
        @else
        <option value="{{$item['value']}}">{{$item['title']}}</option>
        @endif
        @endforeach
    </select>
</div>