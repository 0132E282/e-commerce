@props(['action', 'method'])
@push('link')
    <link rel="stylesheet" href="{{ asset('bootstrap/select2/css/select2.css') }}">
@endpush

<x-form class="h-100 " :action="$action" :method="$method" :custom="true">
    <div class="mb-3 row">
        <div class="col-2">
            <label for="">Ảnh nền </label>
        </div>
        <div class="col">
            <x-input.images name="avatar_url" :valueImage="$user->avatar_url" />
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-2">
            <label for="">Họ và tên</label>
        </div>
        <div class="col">
            <x-input name="name" value="{{ $user->name ?? old('name') }}" />
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-2">
            <label for="">Email của bạn</label>
        </div>
        <div class="col">
            <x-input name="email" value="{{ $user->email ?? old('email') }}" type="email" />
        </div>
    </div>
    @if (empty($user))
        <div class="mb-3 row">
            <div class="col-2">
                <label for="">Mật khẩu</label>
            </div>
            <div class="col">
                <x-input name="password" type="password" value="{{ old('password') }}" />
            </div>
        </div>
    @endif
    <div class="mb-3 row">
        <div class="col-2">
            <label for="">Quyền người dùng</label>
        </div>
        <div class="col">
            <x-select.search name="roles">
                <option value="">Chọn quyền người dùng (mặt định là khác hàng)</option>
                @foreach ($roles as $role)
                    @php
                        $selected = $user->roles->contains($role->id) ? 'selected' : '';
                    @endphp
                    <option value="{{ $role->id }}" {{ $selected }}>{{ $role->name }}</option>
                @endforeach
            </x-select.search>
        </div>
    </div>
    <div class="mt-5">
        <x-button type="submit">
            Tạo tài khoản
        </x-button>
    </div>
</x-form>
@push('scripts')
    <script src="{{ asset('bootstrap/select2/js/select2.full.min.js') }}"></script>
    <script>
        $('.input-image').find('input').on('change', function(e) {
            const urlPath = URL.createObjectURL(e.target.files[0]);
            $(this).parent().find('.load').html('<img class="w-100" src="' + urlPath + '"/>');
        })
        $(document).ready(function() {
            $('.select2').select2()
        })
    </script>
    @stack('scripts-form-product')
@endpush
