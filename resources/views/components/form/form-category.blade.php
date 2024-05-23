@props(['action', 'method' => 'post'])

@push('link')
    <link rel="stylesheet" href="{{ asset('bootstrap/select2/css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush
<x-form action="{{ $action }}" method="{{ $method }}">
    <div class="mb-3">
        <x-input name="name_category" heading="nhập tên category" title="Tên danh mục" placeholder="nhập thông tin" value="{{ $detailCategory->name ?? '' }}" />
    </div>
    <div class="mb-3">
        <x-category.select :categoryList="$categoryList" name="parent" />
    </div>
    <div class="mb-3">
        <x-textarea-form name="description" title="Mô tả sản sản phẩm" :value="$detailCategory->description ?? old('description')" />
    </div>
</x-form>
@push('scripts')
    <script src="{{ asset('bootstrap/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('bootstrap/select2/js/i18n/af.js') }}"></script>
    <script>
        $('.select2').select2()
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    </script>
@endpush
