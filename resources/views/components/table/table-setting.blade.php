@props(['columnNames' => ['#', 'key_setting', 'value', 'action']])
<x-Table :columnNames="$columnNames" :dataTable="$dataTable">
    @foreach ($dataTable as $item)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <th>
                {{ $item->key_setting }}
            </th>
            <th>
                {{ $item->value }}
            </th>
            <td>{{ date('Y/m/d', strtotime($item->created_at)) }}</td>
            <td>
                @if (Route::currentRouteName() == 'trash')
                    <x-button method="POST" action="{{ route('admin.slider.trash.restore', $item->id_slider) }}" class="btn btn-warning">
                        <i class="bi bi-arrow-counterclockwise"></i>
                    </x-button>
                    <x-button method="delete" action="{{ route('admin.slider.trash.destroy', $item->id_slider) }}" class="btn-danger">
                        <i class="bi bi-trash-fill"></i>
                    </x-button>
                @else
                    <x-button link="{{ route('admin.slider.update', $item->id_slider) }}" class="btn btn-warning">
                        <i class="bi bi-pencil-square"></i>
                    </x-button>
                    <x-button data-value="{{ route('admin.slider.delete', $item->id_slider) }}" id="btnModalMassage" data-bs-toggle="modal" data-bs-target="#modalMassage" class="btn-danger">
                        <i class="bi bi-trash-fill"></i>
                    </x-button>
                @endif
            </td>
        </tr>
    @endforeach
</x-Table>
