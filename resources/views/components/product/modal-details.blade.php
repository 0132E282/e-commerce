@props(['id', 'size' => 'xl', 'ariaHidden' => true, 'ariaLabelledby' => ''])
<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-labelledby="{{ $ariaLabelledby }}" aria-hidden="{{ $ariaHidden }}">
    <div class="modal-dialog {{ $size ? 'modal-' . $size : '' }}">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="fw-bold  fs-4 m-0"> Chi tiết sản phẩm</h4>
            </div>
            <div class="modal-body">
                <div class="load-product-details">
                    <x-product.details />
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#{{ $id }}').on('shown.bs.modal', function(e) {
                $.ajax({
                    url: $(e.relatedTarget).data('router'),
                    method: 'get',
                    success: function(html) {
                        $('.load-product-details').html(html);
                    }
                })
            })
        })
    </script>
@endpush
