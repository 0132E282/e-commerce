@props(['message' , 'type' => ''])
<div {{$attributes->class(['alert-success'=> ($type == 'success') , 'alert-danger' => ($type == 'error') ])->merge(['class'=> 'alert'])}} role="alert">
    {{$message}}
</div>