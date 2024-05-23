@extends('pages.brands.index')



@section('brands-manager')
    <div>
        <div class="justify-content-between d-flex align-items-center pb-4">
            <div class="d-flex justify-content-start align-items-center ">
                <h3 class="m-0 fs-5 fw-medium "><span class='fw-bold '>0</span> : nhản hiệu</h3>
            </div>
        </div>
        <x-table.table-brands :brands="$brands" />
        <div class="mt-4">
            {{ $brands->links() }}
        </div>
    </div>
@endsection
