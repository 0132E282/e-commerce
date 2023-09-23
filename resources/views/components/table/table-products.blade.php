@props(['columnNames' => ['#', 'hình ảnh', 'tên sản phẩm', 'giá sản phẩm', 'loại sản phẩm', 'ngày tạo', 'action']])
<x-Table :columnNames="$columnNames" :dataTable="$dataTable">
    @foreach ($dataTable as $key => $value)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <th style="width: 80px; height: auto;">
                <img src="{{ $value->feature_image }}" onerror="this.src='/assets/default-images/empty_product.jpg';" class="img-thumbnail" alt="{{ $value->name_product }}">
            </th>
            <td style="max-width: 200px;">
                <p class="ellipsis" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="This top tooltip is themed via CSS variables.">
                    {{ $value->name_product }}
                </p>
            </td>
            <td>{{ number_format($value->price_product) }}</td>
            <td>{{ $value->name_category }}</td>
            <td>{{ date('Y/m/d', strtotime($value->created_at)) }} </td>
            <td>
                @if (Route::currentRouteName() == 'trash-product')
                    <x-Button method="POST" action="{{ route('restore-product', $value->id_product) }}" class="btn btn-warning">
                        <i class="bi bi-arrow-counterclockwise"></i>
                    </x-Button>
                    <x-Button method="delete" action="{{ route('destroy-product', $value->id_product) }}" class="btn-danger">
                        <i class="bi bi-trash-fill"></i>
                    </x-Button>
                @else
                    <x-Button link="{{ route('update-product', $value->id_product) }}" class="btn btn-warning">
                        <i class="bi bi-pencil-square"></i>
                    </x-Button>
                    <x-Button data-method="delete" data-route="{{ route('delete-product', $value->id_product) }}" data-bs-toggle="modal" data-bs-target="#modal_message" class="btn-danger">
                        <i class="bi bi-trash-fill"></i>
                    </x-Button>
                @endif
            </td>
        </tr>
    @endforeach
</x-Table>
<x-modal.modal-message title="xóa sản phẩm" content="bạn có muốn xóa không" btnTitle="đồng ý xóa" />
<x-modal.modal-message title="xóa sản phẩm" content="bạn có muốn xóa không" btnTitle="đồng ý xóa" />
