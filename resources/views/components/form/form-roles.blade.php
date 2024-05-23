@props(['action', 'method' => 'post'])
<x-form action="{{ $action }}" method="{{ $method }}" :custom="true">
    <div class="row gap-4">
        <div class="col-5">
            <div class="mb-3">
                <x-input name="name" value="{{ $dataForm->name ?? '' }}" title="tên vai trò" />
            </div>
            <div class="mb-3">
                <x-TextareaForm name="description" title="mô tả vai trò">
                    {{ $dataForm->description ?? '' }}
                </x-TextareaForm>
            </div>
            <div class="mt-4">
                <x-button type="submmit">phân quyền</x-button>
            </div>
        </div>
        <div class="col">
            <label>Quền người dùng</label>
            <div class="accordion">
                @foreach ($permissions as $key => $permission)
                    <div class="card">
                        <div class="card-header" id="heading_{{ $key }}">
                            <h2 class="mb-0 d-flex ">
                                <input type="checkbox" />
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse_{{ $key }}" aria-expanded="true" aria-controls="collapse_{{ $key }}">
                                    {{ $permission->display_name }}
                                </button>
                            </h2>
                        </div>
                        <div id="collapse_{{ $key }}" class="collapse" aria-labelledby="heading_{{ $key }}">
                            <div class="card-body">
                                <div class="row px-4 ">
                                    @foreach ($permission->children as $key => $permission)
                                        <div class="col-4">
                                            <x-input type="checkbox" :value="$permission->id" :title="$permission->display_name" :id="$permission->name" name="permissions[]" />
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</x-form>
