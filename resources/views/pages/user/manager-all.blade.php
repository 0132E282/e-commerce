@extends('pages.user.index')

@section('user-manager')
    <div class="d-flex justify-content-between  align-items-center mb-3">
        <p class="m-0 fs-5"><span class="fw-bold">Người dùng :</span> {{ $users->total() }}</p>
        <div class="ms-auto ">
            <x-button :link="route('admin.users.create')">
                <i class="bi bi-plus-circle me-2 "></i>
                <span>Tạo mới</span>
            </x-button>
        </div>
    </div>
    <div class="border ">
        <x-table.table-user :users="$users" />
    </div>
@endsection
