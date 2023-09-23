@props(['columnNames' => ['#', 'tên người nhận', 'email', 'trạng thái', 'ngày tạo', 'action']])
<x-Table :columnNames="$columnNames" :dataTable="$billList">
    @foreach ($billList as $bill)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <th scope="row" data-bs-toggle="modal" data-bs-target="#detail_product" data-value="{{ route('detail-bill', $bill->id) }}">{{ optional($bill->customers)->name }}</th>
            <th scope="row" data-bs-toggle="modal" data-bs-target="#detail_product" data-value="{{ route('detail-bill', $bill->id) }}">{{ optional($bill->customers)->email }}</th>
            <th scope="row" data-bs-toggle="modal" data-bs-target="#detail_product" data-value="{{ route('detail-bill', $bill->id) }}">{{ $bill->status }}</th>
            <th scope="row" data-bs-toggle="modal" data-bs-target="#detail_product" data-value="{{ route('detail-bill', $bill->id) }}">{{ date('Y/m/d', strtotime($bill->created_at)) }}</th>
            <th>
                {{-- @if (Route::currentRouteName() == 'trash-product')
                    <x-Button method="POST" action="{{ route('restore-product', $bill->id) }}" class="btn btn-warning">
                        <i class="bi bi-arrow-counterclockwise"></i>
                    </x-Button>
                    <x-Button method="delete" action="{{ route('destroy-product', $bill->id) }}" class="btn-danger">
                        <i class="bi bi-trash-fill"></i>
                    </x-Button>
                @else
                    <x-Button link="{{ route('update-product', $bill->id) }}" class="btn btn-warning">
                        <i class="bi bi-pencil-square"></i>
                    </x-Button>
                    <x-Button data-value="{{ route('delete-product', $bill->id) }}" id="btnModalMassage" data-bs-toggle="modal" data-bs-target="#modalMassage" class="btn-danger">
                        <i class="bi bi-trash-fill"></i>
                    </x-Button>
                @endif --}}
            </th>
        </tr>
    @endforeach
</x-Table>
<x-modal.modal-bill-detail />
