@props(['action', 'method' => 'post'])
<x-Form action="{{ $action }}" method="{{ $method }}">
    <div class="mb-3">
        <x-InputForm name="name" value="{{ $dataForm->name ?? '' }}" title="tên vai trò" />
    </div>
    <div class="mb-3">
        <x-TextareaForm name="description" title="mô tả vai trò">
            {{ $dataForm->description ?? '' }}
        </x-TextareaForm>
    </div>
    <div>
        @error('permissions')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        @foreach ($permission as $key => $value)
            <x-CardText>
                <x-slot:header>
                    <div class="d-flex justify-content-between">
                        <x-InputForm class="input_wrapper" type="checkbox" title="{{ $value->display_name }}" name="input_wrapper" id="{{ 'input_wrapper_' . $key }}" />
                        <div class="action">
                            <x-Button link="{{ route('update-permissions', $value->id) }}">
                                <i class="bi fs-6 bi-pencil-square"></i>
                            </x-Button>
                        </div>
                    </div>
                </x-slot:header>
                <div class="d-flex">
                    @foreach ($value->permissionsChildren as $permissionChildren)
                        <x-InputForm checked="{{ $dataForm ? $dataForm->permissions->contains('id', $permissionChildren->id) : false }}" value="{{ $permissionChildren->id }}" type="checkbox" title="{{ $permissionChildren->display_name }}"
                            id="{{ 'permissions_' . $permissionChildren->id }}" name="permissions[]" class="me-1" />
                    @endforeach
                </div>
            </x-CardText>
        @endforeach
    </div>
</x-Form>
<script type="module">
    $(document).ready(function() {
        const inputWrapper = $('.input_wrapper');
        inputWrapper.on('change', function(e) {
            $(this).parents('.card').find('input[type="checkbox"]').prop('checked', $(this).prop('checked'));
        });
    });
</script>
