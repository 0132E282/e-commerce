@extends('pages.category.index')

@section('cateogry-content')
    <div class="d-flex justify-content-between align-items-center ">
        <div class="">
            <p class="fw-bold fs-5"> Danh mục: {{ $categoryList->total() }}</p>
        </div>
    </div>
    <x-table.table-category :categoryList="$categoryList" />
@endsection
