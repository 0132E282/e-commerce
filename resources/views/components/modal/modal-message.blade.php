@props(['title', 'content', 'btnTitle', 'id'])
<x-modal.index id="{{ $id ?? 'modal_message' }}">
    <x-slot:header>
        <h5>{{ $title }}</h5>
    </x-slot:header>
    <x-slot:body>
        <p>{{ $content }}</p>
    </x-slot:body>
    <x-slot:action>
        <x-button action="" class="btn-secondary" method="post">{{ $btnTitle }} </x-button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">thoát</button>
    </x-slot:action>
</x-modal.index>
<script type="module">
    $(document).ready(function() {
        const modal = $('#{{ $id }}');
        modal.on('shown.bs.modal', function(e) {
            const route = $(e.relatedTarget).data('route');
            const method = $(e.relatedTarget).data('method');
            modal.find('form').attr('action', route);
            modal.find('input[name="_method"]').attr('value', method);
        })
    })
</script>
