@props(['title', 'content', 'btnTitle', 'id'])
<x-modal.index id="{{ $id ?? 'modal_message' }}">
    <x-slot:header>
        <h5>{{ $title }}</h5>
    </x-slot:header>
    <x-slot:body>
        <p>{{ $content }}</p>
    </x-slot:body>
    <x-slot:action>
        <x-Button action="''" class="btn-secondary" method="post">{{ $btnTitle }}</x-Button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">thoát</button>
    </x-slot:action>
</x-modal.index>
<script type="module">
    $(document).ready(function() {
        $('#modal_message').on('shown.bs.modal', function(e) {
            const route = $(e.relatedTarget).data('route');
            const method = $(e.relatedTarget).data('method');
            $('form').attr('action', route);
            $('form').find('input[name="_method"]').val(method);
        })
    })
</script>
