<x-table :tableHead="['#', 'tên', 'email', 'số điểm', 'nội dung', 'sản phẩm', 'ngày tạo', '']">
    @foreach ($reviews as $review)
        @php
            $bg = !$review->children->count() > 0 ? 'background-color:#aaabab;' : '';
        @endphp
        <tr style="{{ $bg }}">
            <td>{{ $loop->iteration }}</td>
            <td>{{ $review->name }}</td>
            <td>{{ $review->email }}</td>
            <td>
                @if (!empty($review->rating))
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $review->rating)
                            <i class="bi bi-star-fill "></i>
                        @else
                            <i class="bi bi-star"></i>
                        @endif
                    @endfor
                @endif
            </td>
            <td>{{ $review->content }}</td>
            <td>{{ optional($review->product)->name }}</td>
            <td>{{ $review->created_at }}</td>
            <td>
                <x-button :link="route('admin.reviews.details', $review)"><i class="bi bi-chat-left-dots"></i></x-button>
                <x-button data-target="#delete_review" data-toggle="modal" data-method="delete" data-route="{{ route('admin.reviews.delete', $review) }}" class="btn-danger">
                    <i class="bi bi-trash-fill"></i>
                </x-button>
            </td>
        </tr>
    @endforeach
</x-table>
