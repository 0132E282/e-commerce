@extends('/include/layouts/admin-layout')
@section('content')
<!-- Main content -->
<section class="content">
    @if(session()->has('message'))
    @php $message = session()->get('message'); @endphp
    <x-alert message="{{$message['content'] }}" type="{{$message['type']}}" />
    @endif
    <div class="container-fluid">
        @php $route = $detailsMenus? route('update-menus' , $detailsMenus->id_menus ) : route('create-menus'); @endphp
        <x-FormMenus :detailsMenus="$detailsMenus" action="{{$route}}" method="{{isset($detailsMenus->id_menu )? 'put' : 'post'}}" />

    </div>
</section>
<!-- /.content -->
@endsection