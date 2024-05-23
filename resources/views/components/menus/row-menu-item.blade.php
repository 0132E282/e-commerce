@props(['level' => '', 'paddingRow' => 12])

<tr class="row-menu-item">
    <td><input type="checkbox" name="menu_id[]" value="{{ $menuItem->id }}"></td>
    <td style="padding-left: {{ $paddingRow }}px" data-title="{{ $menuItem->title }}"> {{ $level . $menuItem->title }}</td>
    <td>
        <p class="m-0" data-toggle="tooltip" data-placement="top" title="{{ $menuItem->link }}">{{ Str::limit($menuItem->link, 40, ' ...') }}</p>
    </td>
    @switch($menuItem->type)
        @case(1)
            <td>danh mục sản phâm</td>
        @break

        @case(2)
            <td>đường dẫn trang</td>
        @break

        @default
            <td>Tùy chỉnh </td>
    @endswitch
    <td data-locaion="{{ $menuItem->location }}">
        {{ $menuItem->location }}
    </td>
    <td>{{ $menuItem->created_at }}</td>
    <td class="text-end">
        <x-button class="btn-menu-paren" disabled data-action="{{ route('admin.menus.item.update-parent', ['id' => request()->id, 'id_parent' => $menuItem->id]) }}" data-method="patch">
            <i class="bi bi-diagram-3 "></i>
        </x-button>
        <x-button class="btn-warning " data-target="#modal_menu_item" data-toggle="modal" data-method="put" data-route="{{ route('admin.menus.item.update', ['id' => request()->id, 'menu_item_id' => $menuItem->id]) }}">
            <i class="bi bi-pencil-square"></i>
        </x-button>
        <x-button class="btn-danger " data-target="#delete_message" data-toggle="modal" data-method="delete" data-route="{{ route('admin.menus.item.delete', ['id' => request()->id, 'menu_item_id' => $menuItem->id]) }}">
            <i class="bi bi-trash"></i>
        </x-button>
    </td>
</tr>
