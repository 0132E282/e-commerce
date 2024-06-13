@props(['action', 'method' => 'post'])
<x-form action="{{ $action }}" method="{{ $method }}">
    <div>
        <div class="mb-1">
            <label class="form-label">Hình ảnh </label>
        </div>
        <x-input.images name="image_url" :valueImage="$sliderDetails->image_url ?? ''" />
        @error('image_url')
            <p class="fs-6 py-1 text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-3">
        <x-input type="text" value="{{ $sliderDetails->title ?? '' }}" name="title" title="Tiêu đề " placeholder="nhập tiêu đề slider" />
    </div>
    <div class="mb-3">
        <x-input type="text" value="{{ $sliderDetails->links ?? '' }}" name="links" title="Đường dẫn " placeholder="nhập đường dẫn" />
    </div>
    <div class="mb-3">
        <x-select title="Thứ tự xuất hiện" name="location">
            <option value="">Thứ tự xuất hiện</option>
            @for ($i = 1; $i <= 7; $i++)
                <option value="{{ $i }}" {{ !empty($sliderDetails) && $sliderDetails->location === $i ? 'selected' : '' }}>{{ $i }}</option>
            @endfor
        </x-select>
    </div>
    <div class="mb-3">
        <x-input type="text" value="{{ $sliderDetails->content ?? '' }}" name="content" title="mô tả " placeholder="mô tả" />
    </div>
</x-form>

@push('scripts')
    <script>
        $('.input-image').find('input').on('change', function(e) {
            const urlPath = URL.createObjectURL(e.target.files[0]);
            $(this).parent().find('.load').html('<img class="w-100" src="' + urlPath + '"/>');
        })
    </script>
@endpush
