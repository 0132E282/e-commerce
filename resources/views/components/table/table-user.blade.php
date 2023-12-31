@props(['columnNames' => ['#', 'avatar', 'tên người dùng', 'email', 'ngày tạo', 'action']])
<x-Table :columnNames="$columnNames" :dataTable="$dataTable">
    @foreach ($dataTable as $key => $value)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <th style="width: 80px; height: auto;">
                <img src="{{ $value->feature_image }}" onerror="this.src='/assets/default-images/empty_product.jpg';" class="img-thumbnail" alt="{{ $value->name_product }}">
            </th>
            <td style="max-width: 200px;">
                <p class="ellipsis" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="This top tooltip is themed via CSS variables.">
                    {{ $value->name }}
                </p>
            </td>
            <td>{{ $value->email }}</td>
            <td>{{ date('Y/m/d', strtotime($value->created_at)) }} </td>
            <td>
                @if (Route::currentRouteName() == 'trash-user')
                    <x-Button method="post" action="{{ route('restore-user', $value->id) }}" class="btn btn-warning">
                        <i class="bi bi-arrow-counterclockwise"></i>
                    </x-Button>
                    <x-Button data-value="{{ route('destroy-user', $value->id) }}" id="btnModalMassage" data-bs-toggle="modal" data-bs-target="#delete_message" class="btn-danger">
                        <i class="bi bi-trash-fill"></i>
                    </x-Button>
                @else
                    <x-Button link="{{ route('update-user', $value->id) }}" class="btn btn-warning">
                        <i class="bi bi-pencil-square"></i>
                    </x-Button>
                    <x-Button data-method="delete" data-route="{{ route('delete-user', $value->id) }}" data-bs-toggle="modal" data-bs-target="#delete_message" class="btn-danger">
                        <i class="bi bi-trash-fill"></i>
                    </x-Button>
                @endif
            </td>
        </tr>
    @endforeach
</x-Table>
