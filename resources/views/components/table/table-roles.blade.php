@props(['columnNames' => ['#', 'tên', 'ngày tạo', 'action']])
<x-Table :columnNames="$columnNames" :dataTable="$dataTable">
    @foreach ($dataTable as $item)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <th>
                {{ $item->display_name ?? $item->name }}
            </th>
            <td>{{ date('Y/m/d', strtotime($item->created_at)) }}</td>
            <td>
                @if (Route::currentRouteName() == 'trash-role')
                    <x-Button method="POST" action="{{ route('restore-role', $item->id) }}" class="btn btn-warning">
                        <i class="bi bi-arrow-counterclockwise"></i>
                    </x-Button>
                    <x-Button data-method="delete" data-route="{{ route('destroy-role', $item->id) }}" data-bs-toggle="modal" data-bs-target="#delete_message" class="btn-danger">
                        <i class="bi bi-trash-fill"></i>
                    </x-Button>
                @else
                    <x-Button link="{{ route('update-role', $item->id) }}" class="btn btn-warning">
                        <i class="bi bi-pencil-square"></i>
                    </x-Button>
                    <x-Button data-method="delete" data-route="{{ route('delete-role', $item->id) }}" data-bs-toggle="modal" data-bs-target="#delete_message" class="btn-danger">
                        <i class="bi bi-trash-fill"></i>
                    </x-Button>
                @endif
            </td>
        </tr>
    @endforeach
</x-Table>
