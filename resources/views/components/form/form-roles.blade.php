@props(['action', 'method'=> 'post'])
<x-Form action="{{$action}}" method="{{$method}}">
    <div class="mb-3">
        <x-InputForm name="name" value="{{$dataForm->name}}" title="tên vai trò" />
    </div>
    <div class="mb-3">
        <x-TextareaForm name="description" value="{{$dataForm->description}}" title="mô tả vai trò" />
    </div>
    @foreach($permission as $value)
    <x-CardText>
        <x-slot:header>
            <x-InputForm class="input_wrapper" type="checkbox" title="{{$value->display_name}}" name="input_wrapper" />
        </x-slot:header>
        <div class="d-flex">
            @foreach($value->permissionsChildren as $permissionChildren)
            <x-InputForm checked="{{$dataForm->permissions->contains('id',$permissionChildren->id)}}" value="{{$permissionChildren->id}}" type="checkbox" title="{{$permissionChildren->display_name}}" id="{{'permissions_'.$permissionChildren->id}}" name="permissions[]" class="me-1" />
            @endforeach
        </div>
    </x-CardText>
    @endforeach
</x-Form>
<script type="module">
    $(document).ready(function() {
        const inputWrapper = $('.input_wrapper');
        inputWrapper.on('change', function(e) {
            $(this).parents('.card').find('input[type="checkbox"]').prop('checked', $(this).prop('checked'));
        });
    });
</script>