<!-- Modal -->
<x-modal.index id="details-category" size="xl">
    <x-slot:header>
        Chi tết danh mục
    </x-slot:header>
    <x-slot:body>
        <div class="load-catogory-details">
            <x-category.details />
        </div>
    </x-slot:body>
    <x-slot:action>
        <button type="button" class="btn btn-primary btn-save" data-dismiss="modal">Đống</button>
    </x-slot:action>
</x-modal.index>

@push('scripts')
    <script>
        $('#details-category').on('shown.bs.modal', function(e) {
            const route = $(e.relatedTarget).data('route')
            $.ajax({
                url: route,
                mehtod: 'GET',
                success: function(data) {
                    $('.load-catogory-details').html(data);
                }
            })
        })
    </script>
@endpush
