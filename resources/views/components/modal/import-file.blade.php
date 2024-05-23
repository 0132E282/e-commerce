@props(['title' => '', 'btnTitle' => '', 'id' => ''])
<x-modal.index id="{{ $id ?? 'import-file' }}" size="lx">
    <x-slot:header>
        {{ $title ?? 'nhập file của bạn' }}
    </x-slot:header>
    <x-slot:body>
        <form id="form-file" method="POST" class="text-center w-100 d-flex align-items-center  justify-content-center flex-column  h-100 border py-5 rounded" enctype='multipart/form-data'>
            @csrf
            <i class="bi bi-cloud-arrow-down my-2" style="font-size: 52px"></i>
            <input type="file" name="file_import" class="form-control fonte bg-transparent" style="width: 200px;">
        </form>
    </x-slot:body>
</x-modal.index>
<script type="module">
    $(document).ready(function() {
        const idModal = $('#{{ $id }}');
        idModal.on('shown.bs.modal', function(e) {
            const route = $(e.relatedTarget).data('route');
            idModal.find('form').attr('action', route);
        })
        idModal.find('form input[name="file_import"]').on('change', function() {
            idModal.find('form').submit();
        })
    })
</script>
