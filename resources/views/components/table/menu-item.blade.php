<div class="border">
    <x-table :tableHead="['Tiêu đề', 'links', 'loại menus', 'ngày tạo', '']">
        @foreach ($menuItems as $menuItem)
            <tr>
                <td>{{ $menuItem->title }}</td>
                <td>{{ $menuItem->link }}</td>
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
                <td>{{ $menuItem->created_at }}</td>
                <td>
                    <x-button>
                        <i class="bi bi-diagram-3 "></i>
                    </x-button>
                </td>
            </tr>
        @endforeach
    </x-table>
</div>
