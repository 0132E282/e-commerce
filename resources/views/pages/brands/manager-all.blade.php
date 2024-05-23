@extends('pages.brands.index')



@section('brands-manager')
    <div>
        <div class="justify-content-between d-flex align-items-center pb-4">
            <div class="d-flex justify-content-start align-items-center ">
                <h3 class="m-0 fs-5 fw-medium "><span class='fw-bold '>0</span> : nhản hiệu</h3>
            </div>
            <div class="ms-auto ">
                <x-button :link="Route('admin.brands.create')">
                    <i class="bi bi-plus-lg me-1"></i>
                    Tạo mới
                </x-button>
                <x-button data-target="#import-file" data-toggle="modal" data-route="{{ Route('admin.category.import') }}">
                    <i class="bi bi-plus-lg me-1"></i>
                    Thêm nhiều
                </x-button>
                <x-button data-target="#modal-export-brands" data-toggle="modal" class="btn-success">
                    <i class="bi bi-file-earmark me-1"></i>
                    Xuất File
                </x-button>
            </div>
        </div>
        <x-table.table-brands :brands="$brands" />
        <div class="mt-4">
            {{ $brands->links() }}
        </div>
    </div>
@endsection
