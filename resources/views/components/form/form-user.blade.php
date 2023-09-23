@props(['action', 'method'])
<x-Form action="{{ $action }}" method="{{ $method }}">
    <div class="mb-3">
        <x-InputForm name="avatar" type="file" title="avatar" />
    </div>
    <div class="mb-3">
        <x-InputForm name="name" value="{{ $dataUser->name ?? old('name') }}" title="ten nguoi dung" />
    </div>
    <div class="mb-3">
        <x-InputForm name="email" disabled="{{ $method === 'put' ?? false }}" title="email" value="{{ $dataUser->email ?? old('email') }}" type="email" />
    </div>
    <div class="mb-3">
        <x-InputForm name="password" type="password" value="{{ old('password') }}" title="password" />
    </div>
    <div class="mb-3">

        @foreach ($roles as $value)
            <div class="form-check ms-3" style="display:inline-block;">
                <input class="form-check-input" value="{{ $value->id }}" {{ $value->checked ? 'checked' : '' }} name="roles[]" type="checkbox" value="" id="{{ $value->id }}">
                <label class="form-check-label" for="{{ $value->id }}">
                    {{ $value->display_name ?? $value->name }}
                </label>
            </div>
        @endforeach
        @error('roles')
            <p class="py-1">{{ $message }}</p>
        @enderror
    </div>
</x-Form>
