@props(['columnNames' => ['#', 'hình ảnh', 'tên', 'ngày tạo', 'action']])
<x-Table :columnNames="$columnNames" :dataTable="$dataTable">
    @foreach ($dataTable as $value)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <th style="width: 80px; height: auto;">
                <img src="{{ $value->image_url }}" onerror="this.src='/assets/default-images/empty_product.jpg';" class="img-thumbnail" alt="{{ $value->name_product }}">
            </th>
            <td>{{ $value->name_slider }}</td>

            <td>{{ date('Y/m/d', strtotime($value->created_at)) }}</td>
            <td>
                @if (Route::currentRouteName() == 'trash-slider')
                    <x-Button method="Post" action="{{ route('restore-slider', $value->id_slider) }}" class="btn btn-warning">
                        <i class="bi bi-arrow-counterclockwise"></i>
                    </x-Button>
                    <x-Button data-method="delete" data-route="{{ route('destroy-slider', $value->id_slider) }}" data-bs-toggle="modal" data-bs-target="#delete_message" class="btn-danger">
                        <i class="bi bi-trash-fill"></i>
                    </x-Button>
                @else
                    <x-Button link="{{ route('update-slider', $value->id_slider) }}" class="btn btn-warning">
                        <i class="bi bi-pencil-square"></i>
                    </x-Button>
                    <x-Button data-method="delete" data-route="{{ route('delete-slider', $value->id_slider) }}" data-bs-toggle="modal" data-bs-target="#delete_message" class="btn-danger">
                        <i class="bi bi-trash-fill"></i>
                    </x-Button>
                @endif
            </td>
        </tr>
    @endforeach
</x-Table>
