@props(['action', 'method' => 'post'])
<x-form action="{{ $action }}" method="{{ $method }}" :custom="true">
    <div class="row">
        <div class="col-12">
            <x-card.card-text>
                <x-slot:header>
                    <h5 class="m-0 fw-bold ">Cài đặt vai trò</h5>
                </x-slot:header>
                <x-slot:body>
                    <div class="row">
                        @foreach ($models as $keyParent => $model)
                            @php
                                $permissionParen = $permissions->filter(fn($permission) => $permission->name === Str::upper($keyParent))->first() ?? [];
                                $permissionChildrenList = optional($permissionParen)->children;
                            @endphp
                            <div class="col-3 mb-3">
                                <div class="card shadow-none border card-permission" style="min-height: 100%;">
                                    <div class="ps-5 pe-3 d-flex align-items-center  justify-content-between  bg-body-secondary py-2">
                                        <label class="fw-bold fs-5 m-0 d-flex align-items-center justify-content-start ">
                                            <x-input type="checkbox" class="check-all" />
                                            {{ $keyParent }}
                                        </label>
                                        <x-input placeholder="tên hiển thị" :value="$permissionParen['display_name'] ?? 'manager ' . $keyParent" name="permission[{{ $keyParent }}][parent]" />
                                    </div>
                                    <div class=" py-2 px-3 ">
                                        @foreach ($model['config'] as $key => $permission)
                                            @php
                                                $permissionChildren = optional($permissionChildrenList)->filter(fn($permissionChill) => $permissionChill->key_code === $permission['key_code'])?->first() ?? [];
                                            @endphp
                                            <div class="input-group mb-3 check-input-item">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text bg-white ">
                                                        <input class="check-input" type="checkbox" value="{{ $permission['key_code'] }}" name="permission[{{ $keyParent }}][children][{{ $key }}][key_code]"
                                                            {{ !empty($permissionChildren) ? 'checked' : '' }}>
                                                    </div>
                                                </div>
                                                <input type="text" {{ empty($permissionChildren) ? 'disabled' : '' }} class="form-control" name="permission[{{ $keyParent }}][children][{{ $key }}][display_name]"
                                                    value="{{ $permissionChildren->display_name ?? ucwords(strtolower(str_replace('_', ' ', $permission['name']))) }}">
                                                <div class="input-group-text">
                                                    {{ Str::lower(preg_replace('/([a-z])([A-Z])/', '$1 $2', $permission['action'])) }}
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </x-slot:body>
                <x-slot:footer>
                    <x-button type="submit">Lưu vai trò</x-button>
                </x-slot:footer>
            </x-card.card-text>
        </div>
    </div>
</x-form>
@push('scripts')
    <script>
        $('.check-all').on('change', function() {
            $checked = $(this).find('input').is(':checked');
            $(this).closest('.card-permission').each(function() {
                $(this).find('input[type="checkbox"].check-input').each(function() {
                    $(this).attr('checked', $checked);
                })
                $(this).find('.check-input-item input[type="text"]').attr('disabled', !$checked);
            })
        });
        $('input[type="checkbox"].check-input').on('change', function() {
            $(this).closest('.check-input-item').find('input[type="text"]').attr('disabled', !$(this).is(':checked'));
        });
    </script>
@endpush
