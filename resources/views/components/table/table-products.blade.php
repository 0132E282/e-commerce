@props([
    'columnNames' => [
        '#',
        'tên',
        [
            'col_name' => 'danh mục',
            'order' => 'category',
        ],
        [
            'col_name' => 'Thương hiệu',
            'order' => 'brand',
        ],
        [
            'col_name' => 'giá',
            'order' => 'price',
        ],
        [
            'col_name' => 'lượt truy cập',
            'order' => 'view',
        ],

        [
            'col_name' => 'like',
            'order' => 'like',
        ],
        [
            'col_name' => 'kho',
            'order' => 'quantity',
        ],
        [
            'col_name' => 'ngày tạo',
            'order' => 'created',
        ],
        '',
    ],
])
<x-table :tableHead="$columnNames">
    @foreach ($products as $key => $value)
        <tr>
            <td>{{ ++$key }}</td>
            <td>
                <div class="d-flex" style="max-width: 400px;">
                    <img class="img-thumbnail" src="{{ $value->feature_image }}" alt="{{ $value->slug }}" style="max-width: 60px; height: 80px;">
                    <p class="ellipsis ms-2 " data-toggle="tooltip" data-placement="top" data-custom-class="custom-tooltip" data-title="This top tooltip is themed via CSS variables.">
                        {{ $value->name }}
                    </p>
                </div>
            </td>
            <td> {{ optional($value->category)->name }}</td>
            <td> {{ optional($value->brand)->name }}</td>
            <td> {{ number_format($value->min_price) ?? 0 }} {{ !empty($value->max_price) && $value->max_price > $value->min_price ? ' -  ' . number_format($value->max_price) : '' }} đ</td>
            <td> {{ number_format($value->views_count) }}</td>
            <td>{{ 0 }}</td>
            <td>{{ number_format($value->quantity) }}</td>

            <td>{{ date('Y/m/d', strtotime($value->created_at)) }} </td>
            <td class="text-end ">
                @if (Route::currentRouteName() == 'admin.products.trash')
                    <x-button method="POST" action="{{ route('admin.products.restore', $value->id) }}" class="btn btn-warning">
                        <i class="bi bi-arrow-counterclockwise"></i>
                    </x-button>
                    <x-button data-method="delete" data-route="{{ route('admin.products.destroy', $value->id) }}" data-toggle="modal" data-target="#delete_message" class="btn-danger">
                        <i class="bi bi-trash-fill"></i>
                    </x-button>
                @else
                    <x-button class="btn btn-secondary" data-router="{{ route('admin.products.details', ['id' => $value->id]) }}" data-target="#modal-details" data-toggle="modal">
                        <i class="bi bi-eye-fill"></i>
                    </x-button>
                    <x-button action="{{ route('admin.products.update-status', ['id' => $value->id, 'status' => $value->status == 1 ? 0 : 1]) }}" class="btn btn-secondary">
                        @php
                            $icon = $value->status == 1 ? 'bi bi-lock-fill' : 'bi bi-unlock-fill';
                        @endphp
                        <i class="{{ $icon }}"></i>
                    </x-button>
                    <x-button link="{{ route('admin.products.update', $value->id) }}" class="btn btn-warning">
                        <i class="bi bi-pencil-square"></i>
                    </x-button>
                    <x-button data-target="#delete_message" data-toggle="modal" data-method="delete" data-route="{{ route('admin.products.delete', $value->id) }}" class="btn-danger">
                        <i class="bi bi-trash-fill"></i>
                    </x-button>
                @endif
            </td>
        </tr>
    @endforeach
</x-table>
