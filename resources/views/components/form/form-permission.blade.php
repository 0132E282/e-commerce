@props(['action', 'method' => 'post'])
<x-Form action="{{ $action }}" method="{{ $method }}">
    <div class="mb-3">
        <x-SelectForm valueTile="{{ $permissions->name ?? '' }}" disabled="{{ (bool) $permissions }}" titleOptions="{{ $permissions->name ?? 'chon ban cha' }}" :dataSelect="$tableModule" name="module_parent" placeholder="nhập thông tin" />
    </div>
    <div class="mb-3">
        <x-input-form name="display_name" title="ten hien thi" />
    </div>
    <div>
        <x-CardText>
            <x-slot:header>
                <p>phân quyền</p>
            </x-slot:header>
            <div class="input-group">
                @foreach ($permissionsList as $permission)
                    <x-InputForm type="checkbox" checked="{{ $permission['checked'] ?? false }}" value="{{ $permission['value'] }}" title="{{ $permission['title'] }}" id="permissions_{{ $permission['id'] }}" name="permissions[]" class="me-1" />
                @endforeach
            </div>
        </x-CardText>
    </div>
</x-Form>
