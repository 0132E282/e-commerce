<div class="border">
    <x-form id="form-menu-item" action="" :custom="true">
        <x-table :tableHead="['', 'Tiêu đề', 'links', 'loại menus', 'ví trí', 'ngày tạo', '']">
            @foreach ($menuItems as $menuItem)
                <x-menus.row-menu-item :menuItem="$menuItem" />
                @if ($menuItem->children->count() > 0)
                    <x-menus.row-menu-item-children :menuItemChildren="$menuItem->children" />
                @endif
            @endforeach
        </x-table>
    </x-form>
</div>
@push('scripts')
    <script>
        $rowMenuItem = $('.row-menu-item');
        $rowMenuItem.find('input[name="menu_id[]"]').on('change', function() {
            $rowMenuItem.each(function() {
                const isInputChecked = $(this).find('input[name="menu_id[]"]:checked').length > 0;
                $(this).find('.btn-menu-paren').attr('disabled', isInputChecked);
            });
        });
        $('.btn-menu-paren').on('click', function() {
            const form = $('form#form-menu-item');
            form.attr('action', $(this).data('action'));
            form.find('input[name="_method"]').val($(this).data('method'));
            form.submit();
        });
    </script>
@endpush
