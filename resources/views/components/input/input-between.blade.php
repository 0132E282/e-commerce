@props(['labde' => '', 'name' => '', 'type', 'placeholder' => [], 'value' => ''])
@php
    $nameGroup = $name . '-group';
    $valueArr = explode('_', $value);
@endphp
<div class="row {{ $nameGroup }}">
    @if (!empty($labde))
        <div class="col-2">
            <label for="">{{ $labde }}</label>
        </div>
    @endif
    <div class="col">
        <input type="{{ $type }}" class="form-control" value="{{ $valueArr[0] ?? '' }}" placeholder="{{ $placeholder['start'] ?? 'bắt đầu' }}" id="data-start">
    </div>
    <div class="col-1 text-center ">
        -
    </div>
    <div class="col">
        <input type="{{ $type }}" class="form-control" value="{{ $valueArr[1] ?? '' }}" placeholder="{{ $placeholder['end'] ?? 'kết thúc' }}" id="data-end">
    </div>
    <input type="text" hidden name="{{ $name }}">
</div>
@push('scripts')
    <script>
        $('.{{ $nameGroup }}').find('input').on("change", function() {
            const value = $('.{{ $nameGroup }}').find('input[id="data-start"]').val() + '_' + $('.{{ $nameGroup }}').find('input[id="data-end"]').val()
            $('.{{ $nameGroup }}').find('input[name="{{ $name }}"]').attr('value', value);
        })
    </script>
@endpush
