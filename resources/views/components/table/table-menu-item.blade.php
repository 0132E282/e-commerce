@props(['bill' => []])
<x-table :tableHead="['Tên sản phẩm', 'màu', 'kích thước', 'số lượng', 'giá mõi sản phẩm', 'tổng giá', '']">
    <x-form :action="route('admin.order.update-item', ['id' => $bill->id])" method="put" :custom="true" id="update-order-item">
        @foreach ($bill->order_items as $orderItem)
            <tr>
                <td>
                    <img class="me-2 d-inline-block " style="max-width: 40px;" src="{{ $orderItem->variation->product->feature_image }}" alt="">
                    <p class="d-inline-block m-0" style="max-width: 300px;"> {{ Str::limit($orderItem->variation->product->name, 50, '...') }}</p>
                </td>
                <td>{{ $orderItem->variation->color }}</td>
                <td>{{ $orderItem->variation->size }}</td>
                <td><input type="number" name="order[{{ $orderItem->id }}][quantity]" style="max-width: 50px;" value="{{ $orderItem->quantity }}"></td>
                <td>{{ number_format($orderItem->price) }} đ</td>
                <td>{{ number_format($orderItem->quantity * $orderItem->price) }} đ</td>
                <td class="text-end">
                    <x-button data-target="#delete_message" data-toggle="modal" data-method="delete" data-route="{{ route('admin.order.delete-order-item', ['id' => $bill->id, 'id_order_item' => $orderItem->id]) }}" class="btn-danger">
                        <i class="bi bi-trash-fill"></i>
                    </x-button>
                </td>
            </tr>
        @endforeach
    </x-form>
</x-table>
