<div class="card text-bg-light" style="max-width: 100%;">
    @if (!empty($header))
        <div class="card-header">
            {{ $header }}
        </div>
    @endif
    <div class="card-body">
        {{ $body }}
    </div>
    @if (!empty($footer))
        <div class="card-footer">
            {{ $footer }}
        </div>
    @endif
</div>
