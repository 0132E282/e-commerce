@props(['columnNames' => ['#', 'tên category', 'slug', 'ngày tạo', 'action']])
<x-Table :columnNames="$columnNames" :dataTable="$dataCategoryList">
    @foreach ($dataCategoryList as $value)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $value->name_category }}</td>
            <td>{{ $value->slug_category }}</td>
            <td>{{ date('Y/m/d', strtotime($value->created_at)) }}</td>
            <td>
                @if (Route::currentRouteName() == 'trash-category')
                    <x-Button method="POST" action="{{ route('restore-category', $value->id_category) }}" class="btn btn-warning">
                        <i class="bi bi-arrow-counterclockwise"></i>
                    </x-Button>
                    <x-Button data-method="delete" data-route="{{ route('destroy-category', $value->id_category) }}" data-bs-toggle="modal" data-bs-target="#delete_message" class="btn-danger">
                        <i class="bi bi-trash-fill"></i>
                    </x-Button>
                @else
                    <x-Button link="{{ route('update-category', $value->id_category) }}" class="btn btn-warning">
                        <i class="bi bi-pencil-square"></i>
                    </x-Button>
                    <x-Button data-method="delete" data-route="{{ route('delete-category', $value->id_category) }}" data-bs-toggle="modal" data-bs-target="#delete_message" class="btn-danger">
                        <i class="bi bi-trash-fill"></i>
                    </x-Button>
                @endif
            </td>
        </tr>
    @endforeach
</x-Table>
