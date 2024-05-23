@props(['tableHead' => ['#', 'tên menu', 'vị trí', 'mô tả', 'người tạo', 'ngày tạo', '']])
<x-table :tableHead="$tableHead">
    @foreach ($menus as $menu)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $menu->name }}</td>
            <td>{{ $menu->location }}</td>
            <td>{{ $menu->description }}</td>
            <td>{{ $menu->user->name }}</td>
            <td>{{ date('Y/m/d', strtotime($menu->created_at)) }}</td>
            <td class="text-end">
                @if (Route::currentRouteName() == 'admin.menus.trash.index')
                    <x-button method="POST" action="{{ route('admin.menus.trash.restore', $menu->id) }}" class="btn btn-warning">
                        <i class="bi bi-arrow-counterclockwise"></i>
                    </x-button>
                    <x-button data-method="delete" data-route="{{ route('admin.menus.trash.destroy', $menu->id) }}" data-toggle="modal" data-target="#delete_message" class="btn-danger" class="btn-danger">
                        <i class="bi bi-trash-fill"></i>
                    </x-button>
                @else
                    <x-button link="{{ route('admin.menus.item.index', $menu->id) }}" class="btn btn-secondary ">
                        <i class="bi bi-diagram-3"></i>
                    </x-button>
                    <x-button link="{{ route('admin.menus.update', $menu->id) }}" class="btn btn-warning">
                        <i class="bi bi-pencil-square"></i>
                    </x-button>
                    <x-button data-method="delete" data-route="{{ route('admin.menus.delete', $menu->id) }}" data-toggle="modal" data-target="#delete_message" class="btn-danger">
                        <i class="bi bi-trash-fill"></i>
                    </x-button>
                @endif
            </td>
        </tr>
    @endforeach
</x-table>
