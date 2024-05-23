@props(['tableHead' => ['#', 'hình ảnh', 'tiêu đề', 'cotent', 'link', 'người tạo', 'lượt xem', 'vị trí', 'ngày tạo', '']])
<x-table :tableHead="$tableHead">
    @if ($sliders->count() > 0)
        @foreach ($sliders as $slider)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <th style="max-width: 100px; height: auto;">
                    <img src="{{ $slider->image_url }}" onerror="this.src='/assets/default-images/empty_product.jpg';" class="img-thumbnail" alt="{{ $slider->name_product }}">
                </th>
                <td>{{ $slider->title }}</td>
                <td>{{ $slider->content }}</td>
                <td>{{ $slider->links }}</td>
                <td>{{ $slider->user->name }}</td>
                <td>{{ $slider->views_count }}</td>
                <td>{{ $slider->location }}</td>
                <td>{{ date('Y/m/d', strtotime($slider->created_at)) }}</td>
                <td class="text-end">
                    @if (Route::currentRouteName() == 'admin.slider.trash.index')
                        <x-button method="Post" action="{{ route('admin.slider.trash.restore', $slider->id) }}" class="btn btn-warning">
                            <i class="bi bi-arrow-counterclockwise"></i>
                        </x-button>
                        <x-button data-method="delete" data-route="{{ route('admin.slider.trash.destroy', $slider->id) }}" data-toggle="modal" data-target="#delete_message" class="btn-danger">
                            <i class="bi bi-trash-fill"></i>
                        </x-button>
                    @else
                        <x-button link="{{ route('admin.slider.update', $slider->id) }}" class="btn btn-warning">
                            <i class="bi bi-pencil-square"></i>
                        </x-button>
                        <x-button data-method="delete" data-route="{{ route('admin.slider.delete', $slider->id) }}" data-toggle="modal" data-target="#delete_message" class="btn-danger">
                            <i class="bi bi-trash-fill"></i>
                        </x-button>
                    @endif
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="{{ count($tableHead) }}" class="border-bottom-0">
                <div class="d-flex flex-column  justify-content-center align-items-center " style="min-height: 35vh;">
                    <div class="mt-5">
                        <i class="bi bi-card-image  " style="font-size: 100px;"></i>
                    </div>
                    <p class="m-0 fw-bold  fs-6">không có dữ liệu</p>
                </div>
            </td>
        </tr>
    @endif
</x-table>
