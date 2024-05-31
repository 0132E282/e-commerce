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
    @foreach ($products as $key => $product)
        <tr>
            <td>{{ ++$key }}</td>
            <td>
                <div class="d-flex" style="max-width: 400px;">
                    <img class="img-thumbnail" src="{{ $product->feature_image }}" alt="{{ $product->slug }}" style="max-width: 60px; height: 80px;">
                    <p class="ellipsis ms-2 " data-toggle="tooltip" data-placement="top" data-custom-class="custom-tooltip" data-title="This top tooltip is themed via CSS variables.">
                        {{ $product->name }}
                    </p>
                </div>
            </td>
            <td> {{ optional($product->category)->name }}</td>
            <td> {{ optional($product->brand)->name }}</td>
            <td> {{ number_format($product->min_price) ?? 0 }} {{ !empty($product->max_price) && $product->max_price > $product->min_price ? ' -  ' . number_format($product->max_price) : '' }} đ</td>
            <td> {{ number_format($product->views_count) }}</td>
            <td>{{ 0 }}</td>
            <td>{{ number_format($product->quantity) }}</td>

            <td>{{ date('Y/m/d', strtotime($product->created_at)) }} </td>
            <td class="text-end ">
                @if (Route::currentRouteName() == 'admin.products.trash')
                    <x-button method="POST" action="{{ route('admin.products.restore', $product->id) }}" class="btn btn-warning">
                        <i class="bi bi-arrow-counterclockwise"></i>
                    </x-button>
                    <x-button data-method="delete" data-route="{{ route('admin.products.destroy', $product->id) }}" data-toggle="modal" data-target="#delete_message" class="btn-danger">
                        <i class="bi bi-trash-fill"></i>
                    </x-button>
                @else
                    <x-button class="btn btn-secondary" :link="route('admin.products.details', $product)">
                        <i class="bi bi-eye-fill"></i>
                    </x-button>
                    <x-button action="{{ route('admin.products.update-status', ['id' => $product->id, 'status' => $product->status == 1 ? 0 : 1]) }}" class="btn btn-secondary">
                        @php
                            $icon = $product->status == 1 ? 'bi bi-lock-fill' : 'bi bi-unlock-fill';
                        @endphp
                        <i class="{{ $icon }}"></i>
                    </x-button>
                    <x-button link="{{ route('admin.products.update', $product->id) }}" class="btn btn-warning">
                        <i class="bi bi-pencil-square"></i>
                    </x-button>
                    <x-button data-target="#delete_message" data-toggle="modal" data-method="delete" data-route="{{ route('admin.products.delete', $product->id) }}" class="btn-danger">
                        <i class="bi bi-trash-fill"></i>
                    </x-button>
                @endif
            </td>
        </tr>
    @endforeach
</x-table>
