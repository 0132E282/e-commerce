@props(['tableHead' => ['#', 'tên người dùng', 'email', 'quyền', 'xát thực', 'ngày tạo', '']])
<x-table :tableHead="$tableHead">
    @if ($users->count() > 0)
        @foreach ($users as $key => $user)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>
                    <div class="d-flex">
                        <img class="img-thumbnail me-2 " src="{{ $user->feature_image }}" onerror="this.src='/assets/default-images/empty_product.jpg';" alt="{{ $user->name_product }}" style="width: 50px;">
                        <p>
                            {{ $user->name }}
                        </p>
                    </div>
                </td>
                <td>{{ $user->email }}</td>
                <td>{{ optional($user->roles->first())->name }} {{ $user->roles->count() > 1 ? '(' . $user->roles->count() - 1 . ')' : '' }} </td>
                <td>{{ !empty($user->email_verified_at) ? 'đã xát thực' : 'chưa xát thực' }}</td>
                <td>{{ date('Y/m/d', strtotime($user->created_at)) }} </td>
                <td class="text-end">
                    <x-button class="btn-info " :link="route('admin.users.profile', ['id' => $user->id])">
                        <span data-toggle="tooltip" data-placement="top" title="xem chi tiết">
                            <i class="bi bi-eye"></i>
                        </span>
                    </x-button>
                    <x-button method="patch" :action="Route('admin.users.update-status', ['id' => $user->id, 'status' => $user->status == 0 ? 1 : 0])" class="btn btn-secondary " title="{{ $user->status == 0 ? 'khóa tài khoản' : 'mỡ khóa tài khoản' }}" data-toggle="tooltip" data-placement="top">
                        <i class="{{ $user->status == 1 ? 'bi bi-lock' : 'bi bi-unlock ' }}"></i>
                    </x-button>
                    <x-button link="{{ route('admin.users.update', $user->id) }}" class="btn btn-warning">
                        <i class="bi bi-pencil-square"></i>
                    </x-button>
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="{{ count($tableHead) }}" class="border-bottom-0">
                <div class="d-flex flex-column  justify-content-center align-items-center " style="min-height: 35vh;">
                    <div class="mt-5">
                        <i class="bi bi-people" style="font-size: 100px;"></i>
                    </div>
                    <p class="m-0 fw-bold  fs-6">không có dữ liệu</p>
                </div>
            </td>
        </tr>
    @endif

</x-table>
