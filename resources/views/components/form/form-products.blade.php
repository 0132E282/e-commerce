@props(['route', 'method' => 'POST'])
@push('link')
    <link rel="stylesheet" href="{{ asset('bootstrap/select2/css/select2.css') }}">
@endpush

<x-form action="{{ $route }}" method="{{ $method }}">
    <div class="mb-3">
        <label class="form-label"> ảnh bìa sản phẩm</label>
        <div class="d-flex">
            <x-input.images :valueImage="$detailProduct->feature_image ?? ''" name="feature_image" />
            <div class="ms-2" style="max-width: 200px;">
                <p>ảnh có độ phân giải 250x500</p>
            </div>
        </div>
        @error('feature_image')
            <p class="fs-6 py-1 text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label class="form-label"> ảnh mô tả sản phẩm</label>
        <div class="d-flex gap-3">
            @for ($i = 0; $i <= 8; $i++)
                @php
                    $image = $detailProduct?->description_image[$i] ?? '';
                @endphp
                <x-input.images name="description_image[{{ $i }}]" :valueImage="$image" />
            @endfor
        </div>
    </div>
    <div class="mb-3">
        <x-input name="name_product" value="{{ $detailProduct->name ?? old('name_product') }}" title="nhập tên sản phẩm" />
    </div>
    <div class="mb-3">
        <x-category.select :id_active="$detailProduct->id_category ?? ''" label="danh mục sản phẩm" :categoryList="$categoryList" name="category" heading="danh mục sản phẩm" />
    </div>
    <div class="mb-4">
        <x-select.search name="brand" title="thương hiệu ">
            <option value="">chọn thương hiệu</option>
            @foreach ($brands as $brand)
                <option value="{{ $brand->id }}"{{ !empty($detailProduct->brand_id) && $brand->id == $detailProduct->brand_id ? 'selected' : '' }}>{{ $brand->name }}</option>
            @endforeach
        </x-select.search>
    </div>
    <div class="mb-4">
        <x-ek-editor id="description" name="description" label="Mô tả sản phẩm" height="300" :value="$detailProduct->content ?? ''" />
    </div>

    <div class="mb-4">
        <x-select.tags name="tags[]" label="thẻ sản phẩm" placeholder="nhập thẻ sản phẩm">
            @if (!empty($detailProduct))
                @foreach ($detailProduct->tags as $tag)
                    <option value="{{ $tag->name }}" selected>{{ $tag->name }}</option>
                @endforeach
            @endif
        </x-select.tags>
    </div>
    <div class="row mb-3">
        <x-product.table-create-attr :variations="$detailProduct->variations ?? []" />
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
            $('.select2-tag').select2({
                tags: true
            });
        })
    </script>
    @stack('scripts-form-product')
@endpush
