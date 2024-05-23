@props(['tableHead' => ['#', 'name', 'Mô tả', 'sản phẩm', 'lượt try cập', 'người tạo', 'ngày tạo', '']])

<x-table :tableHead="$tableHead">
    @foreach ($brands as $brand)
        <tr>
            <td>{{ $brand->id }}</td>
            <td style="max-width: 100px;">
                <p class="w-100 fs-6 ">
                    {{ $brand->name }}
                </p>
            </td>
            <td>{{ $brand->description }}</td>
            <td>{{ $brand->products->count() }}</td>
            <td>{{ $brand->products->sum('views_count') }}</td>
            <td>{{ $brand->user->name }}</td>
            <td>{{ $brand->created_at }}</td>
            <td>
                <div class="ms-auto text-end">
                    @if (Route::currentRouteName() == 'admin.brands.trash.show')
                        <x-button method="POST" action="{{ route('admin.brands.trash.restore', $brand->id) }}" class="btn btn-warning">
                            <i class="bi bi-arrow-counterclockwise"></i>
                        </x-button>
                        <x-button class="btn-danger" data-toggle="modal" data-method="delete" data-route="{{ route('admin.brands.trash.destroy', $brand->id) }}" data-target="#delete_message">
                            <span title="xóa vĩnh viễn" data-toggle="tooltip" data-placement="top">
                                <i class="bi bi-trash-fill"></i>
                            </span>
                        </x-button>
                    @else
                        <x-button class="btn btn-warning" title="chỉn sửa" link="{{ route('admin.brands.update', $brand->id) }}" data-toggle="tooltip" data-placement="top">
                            <i class="bi bi-pencil-square"></i>
                        </x-button>
                        <x-button class="btn btn-warning" title="cập nhập trạng thái" method="patch" action="{{ route('admin.brands.update-status', ['id' => $brand->id, 'status' => $brand->status == 1 ? 0 : 1]) }}" data-toggle="tooltip"
                            data-placement="top">
                            <i class="{{ $brand->status == 1 ? 'bi bi-lock' : 'bi bi-unlock ' }}"></i>
                        </x-button>
                        <x-button class="btn-danger" data-toggle="modal" data-method="delete" data-target="#delete_message" data-route="{{ route('admin.brands.delete', $brand->id) }}">
                            <span title="chuyển vào thùng rác" data-toggle="tooltip" data-placement="top">
                                <i class="bi bi-trash-fill"></i>
                            </span>
                        </x-button>
                    @endif
                </div>
            </td>
        </tr>
    @endforeach
</x-table>
