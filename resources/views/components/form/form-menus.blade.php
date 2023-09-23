@props(['action', 'method' => 'post'])
<x-Form action="{{ $action }}" method="{{ $method }}">
    <div class="mb-3">
        <x-InputForm name="name_menus" heading="tên menus" value="{{ $detailsMenus->name_menus ?? '' }}" placeholder="nhập thông tin" />
    </div>
    <div class="mb-3">
        <x-InputForm name="route_menus" heading="đường dân " value="{{ $detailsMenus->route ?? '' }}" placeholder="nhập thông tin" />
    </div>
    <div class=" mb-3">
        <x-SelectForm name="parent_id" :dataSelect="$dataMenuSelect" />
    </div>
</x-Form>
