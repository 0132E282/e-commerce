@props(['action' , 'method'=> 'post'])

<form action="{{$action}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method($method)
    {{$slot}}
    <x-Button type="submit">Submit</x-Button>
</form>