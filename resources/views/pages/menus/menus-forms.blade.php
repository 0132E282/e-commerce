@extends('/include/layouts/admin-layout')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <x-BreadcrumbAdmin :value="$detailMenus" />
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    @if(session()->has('message'))
    @php $message = session()->get('message'); @endphp
    <x-alert message="{{$message['content'] }}" type="{{$message['type']}}" />
    @endif
    <div class="container-fluid">
        @php $route = $detailMenus? route('update-menus' , $detailMenus->id_menus ) : route('create-menus'); @endphp
        <form action="{{$route }}" method="post">
            @csrf
            @if($detailMenus) @method('put') @endif
            <div class="mb-3">
                <x-InputForm name="name_menus" heading="tên menus" value="{{$detailMenus->name_menus ?? ''}}" placeholder="nhập thông tin" />
            </div>
            <div class="mb-3">
                <x-InputForm name="route_menus" heading="đường dân " value="{{$detailMenus->route ?? ''}}" placeholder="nhập thông tin" />
            </div>
            <div class=" mb-3">
                <x-Recusive :data="$menusList" name="parent_id" />
            </div>
            <x-Button type="submit">submit</x-Button>
        </form>
    </div>
</section>
<!-- /.content -->
@endsection