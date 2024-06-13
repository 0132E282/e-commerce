@props(['category', 'row' => ''])

<tr>
    <th scope="row">{{ $row }}</th>
    <td>{{ $category->name }}</td>
    <td>{{ $category->description }}</td>
    <td>{{ $category->views_count }}</td>
    <td>{{ $category->quantity_products }}</td>
    <td>{{ $category->status == 1 ? 'hoạt động' : 'ngưng hoạt động' }}</td>
    <td>{{ date('Y/m/d', strtotime($category->created_at)) }}</td>
    <td class="text-end ">
        @if (Route::currentRouteName() == 'admin.category.trash.show')
            <x-button method="POST" action="{{ route('admin.category.trash.restore', $category->id) }}" class="btn btn-warning">
                <i class="bi bi-arrow-counterclockwise"></i>
            </x-button>
            <x-button class="btn-danger" data-toggle="modal" data-method="delete" data-route="{{ route('admin.category.trash.destroy', $category->id) }}" data-target="#delete_message">
                <span title="xóa vĩnh viễn" data-toggle="tooltip" data-placement="top">
                    <i class="bi bi-trash-fill"></i>
                </span>
            </x-button>
        @else
            <div class="w-100">
                <x-button class="btn-secondary" data-target="#details-category" data-toggle="modal" data-route="{{ route('admin.category.details', $category->id) }}">
                    <span data-toggle="tooltip" data-placement="top" title="xem chi tiết">
                        <i class="bi bi-eye"></i>
                    </span>
                </x-button>
                <x-button class="btn btn-warning" title="chỉn sửa" link="{{ route('admin.category.update', $category->id) }}" data-toggle="tooltip" data-placement="top">
                    <i class="bi bi-pencil-square"></i>
                </x-button>
                <x-button class="btn btn-warning" title="cập nhập trạng thái" action="{{ route('admin.category.update-status', $category->id) }}" data-toggle="tooltip" data-placement="top">
                    <i class="{{ $category->status == 1 ? 'bi bi-lock' : 'bi bi-unlock ' }}"></i>
                </x-button>
                <x-button class="btn-danger" data-toggle="modal" data-method="delete" data-target="#delete_message" data-route="{{ route('admin.category.delete', $category->id) }}">
                    <span title="chuyển vào thùng rác" data-toggle="tooltip" data-placement="top">
                        <i class="bi bi-trash-fill"></i>
                    </span>
                </x-button>
            </div>
        @endif
    </td>
</tr>
