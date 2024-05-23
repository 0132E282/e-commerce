@props(['tableHead' => ['#', 'tên', 'số lượng', 'ngày tạo', '']])
<x-table :tableHead="$tableHead">
    @foreach ($roles as $role)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <th>
                {{ $role->display_name ?? $role->name }}
            </th>
            <th scope="row">{{ $role->users->count() }}</th>
            <td>{{ date('Y/m/d', strtotime($role->created_at)) }}</td>
            <td>
                @if (Route::currentRouteName() == 'admin.roles.trash')
                    <x-button method="POST" action="{{ route('admin.roles.restore', $role->id) }}" class="btn btn-warning">
                        <i class="bi bi-arrow-counterclockwise"></i>
                    </x-button>
                    <x-button data-method="delete" data-route="{{ route('admin.roles.destroy', $role->id) }}" data-bs-toggle="modal" data-bs-target="#delete_message" class="btn-danger">
                        <i class="bi bi-trash-fill"></i>
                    </x-button>
                @else
                    <x-button link="{{ route('admin.roles.update', $role->id) }}" class="btn btn-warning">
                        <i class="bi bi-pencil-square"></i>
                    </x-button>
                    <x-button data-method="delete" data-route="{{ route('admin.roles.delete', $role->id) }}" data-bs-toggle="modal" data-bs-target="#delete_message" class="btn-danger">
                        <i class="bi bi-trash-fill"></i>
                    </x-button>
                @endif
            </td>
        </tr>
    @endforeach
</x-table>
