@props(['columnNames' => ['#', 'tên menus', 'đường dẫn', 'ngày tạo', 'action']])
<x-Table :columnNames="$columnNames" :dataTable="$dataTable">
    @foreach ($dataTable as $item)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $item->name_menus }}</td>
            <td>{{ $item->route }}</td>

            <td>{{ date('Y/m/d', strtotime($item->created_at)) }}</td>
            <td>
                @if (Route::currentRouteName() == 'trash-menus')
                    <x-Button method="POST" action="{{ route('restore-menus', $item->id_menus) }}" class="btn btn-warning">
                        <i class="bi bi-arrow-counterclockwise"></i>
                    </x-Button>
                    <x-Button data-method="delete" data-route="{{ route('destroy-menus', $item->id_menus) }}" data-bs-toggle="modal" data-bs-target="#delete_message" class="btn-danger" class="btn-danger">
                        <i class="bi bi-trash-fill"></i>
                    </x-Button>
                @else
                    <x-Button link="{{ route('update-menus', $item->id_menus) }}" class="btn btn-warning">
                        <i class="bi bi-pencil-square"></i>
                    </x-Button>
                    <x-Button data-method="delete" data-route="{{ route('delete-menus', $item->id_menus) }}" data-bs-toggle="modal" data-bs-target="#delete_message" class="btn-danger">
                        <i class="bi bi-trash-fill"></i>
                    </x-Button>
                @endif
            </td>
        </tr>
    @endforeach
</x-Table>
