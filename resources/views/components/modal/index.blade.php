@props(['id', 'size' => '', 'ariaHidden' => true, 'ariaLabelledby' => ''])
<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-labelledby="{{ $ariaLabelledby }}" aria-hidden="{{ $ariaHidden }}">
    <div class="modal-dialog {{ $size ? 'modal-' . $size : '' }}">
        <div class="modal-content">
            <div class="modal-header">
                {{ $header }}
            </div>
            <div class="modal-body">
                {{ $body }}
            </div>
            @if (!empty($action))
                <div class="modal-footer">
                    {{ $action }}
                </div>
            @endif
        </div>
    </div>
</div>
