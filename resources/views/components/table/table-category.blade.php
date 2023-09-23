@props(['columnNames' => ['#', 'tên category', 'slug', 'ngày tạo', 'action']])
<x-Table :columnNames="$columnNames" :dataTable="$dataCategoryList">
    @foreach ($dataCategoryList as $category)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $category->name_category }}</td>
            <td>{{ $category->slug_category }}</td>
            <td>{{ date('Y/m/d', strtotime($category->created_at)) }}</td>
            <td>
                @if ($routeName == 'table-category')
                    <x-Button link="{{ route('update-category', $category->id_category) }}" class="btn btn-warning">
                        <i class="bi bi-pencil-square"></i>
                    </x-Button>
                    <x-Button method="delete" action="{{ route('delete-category', $category->id_category) }}" class="btn-danger">
                        <i class="bi bi-trash-fill"></i>
                    </x-Button>
                @else
                    <x-Button method="POST" action="{{ route('restore-category', $category->id_category) }}" class="btn btn-warning">
                        <i class="bi bi-arrow-counterclockwise"></i>
                    </x-Button>
                    <x-Button method="delete" action="{{ route('destroy-category', $category->id_category) }}" class="btn-danger">
                        <i class="bi bi-trash-fill"></i>
                    </x-Button>
                @endif
            </td>
        </tr>
    @endforeach
</x-Table>
