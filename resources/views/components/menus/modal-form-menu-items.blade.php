@props(['title' => null, 'id' => null])
<x-modal.index id="{{ $id ?? 'modal_menu_item' }}" size="lg">
    <x-slot:header>
        <h4 class="fs-5 fw-bold  m-0 ">{{ $title ?? 'Cập nhập menu' }}</h4>
    </x-slot:header>
    <x-slot:body>
        <x-form action="" :custom="true" id="form-menus">
            <x-input title="tiêu đề" name="title" />
            <x-input title="vị trí" type="number" name="locaion" />
            <x-input title="Đường dẫn" type="url" name="link" />
        </x-form>
    </x-slot:body>
    <x-slot:action>
        <x-button type="submit" form="form-menus">
            Lưu dữ liệu
        </x-button>
    </x-slot:action>
</x-modal.index>
<script type="module">
    $(document).ready(function() {
        const modal = $("#{{ $id ?? 'modal_menu_item' }}");
        modal.on('shown.bs.modal', function(e) {
            const row = $(e.relatedTarget).closest('tr');
            const title = row.find('td[data-title]').data('title');
            const location = row.find('td[data-location]').data('location');
            const links = row.find('[data-toggle="tooltip"]').attr('title');
            const action = $(e.relatedTarget).data('route');
            const method = $(e.relatedTarget).data('method');
            modal.find('form#form-menus').attr('action', action);
            modal.find('input[name="_method"]').val(method);
            modal.find('input[name="title"]').val(title);
            modal.find('input[name="location"]').val(location);
            modal.find('input[name="link"]').val(links);
        })
        modal.on('hide.bs.modal', function(e) {
            modal.find('form#form-menus')[0].reset();
        });
    })
</script>
