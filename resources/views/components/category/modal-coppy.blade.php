<!-- Modal -->
<x-modal.index id="modal-coppy" size="lg">
    <x-slot:header>
        Coppy danh mục
    </x-slot:header>
    <x-slot:body>
        <div class="input-group mb-3">
            <input type="text" class="form-control">
            <div class="input-group-prepend">
                <button type="button" class="btn btn-danger coppy">coppy</button>
            </div>
        </div>
    </x-slot:body>
    <x-slot:action>
        <button type="button" class="btn btn-primary btn-save" data-dismiss="modal">đống</button>
    </x-slot:action>
</x-modal.index>

@push('scripts')
    <script>
        const modalCoppy = $('#modal-coppy');
        modalCoppy.on('shown.bs.modal', function(e) {
            const path = $(e.relatedTarget).data('path');
            modalCoppy.find('input').val(path)
        })
        modalCoppy.on('hidden.bs.modal', function() {
            modalCoppy.find('input').val('')
            modalCoppy.find('button.coppy').text('coppy')

        })
        modalCoppy.find('button.coppy').on('click', function() {
            const textCoppy = modalCoppy.find('input');
            textCoppy[0].select();
            textCoppy[0].setSelectionRange(0, 99999);
            navigator.clipboard.writeText(textCoppy.val());
            $(this).text('Đã coppy')
        })
    </script>
@endpush
