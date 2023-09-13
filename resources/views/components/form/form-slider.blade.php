@props(['action' , 'method'=> 'post'])
<div>
    <form action="{{$action}}" method="POST">
        @method($method)

    </form>
</div>