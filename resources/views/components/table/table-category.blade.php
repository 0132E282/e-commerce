@php
    $tableHead = [
        '#',
        'tên danh mục',
        'mô tả',
        [
            'col_name' => 'truy Cập',
            'order' => 'views_count',
        ],
        [
            'col_name' => 'sản phẩm',
            'order' => 'quantity_products',
        ],
        [
            'col_name' => 'trạng thái',
            'order' => 'status',
        ],
        [
            'col_name' => 'ngày tạo',
            'order' => 'created_at',
        ],
        '',
    ];

@endphp
<x-Table.index :tableHead="$tableHead">
    @if ($categoryList->count() > 0)
        @foreach ($categoryList as $category)
            <x-category.row-table :category="$category" :row="$loop->iteration" />
            @if ($category->children->count() > 0)
                <x-category.row-table-chill :categoryChill="$category->children" />
            @endif
        @endforeach
    @else
        <tr style="border-color: transparent">
            <th scope="row" colspan="{{ count($tableHead) }}">
                <div class="text-center " style="margin-top: 100px">
                    <img class="w-100 me-2 " style="max-width: 150px;" loading="lazy" src="{{ asset('assets/default-images/empty_category.png') }}" alt="">
                    <p> Không có dữ liệu</p>
                </div>
            </th>
        </tr>
    @endif
</x-Table.index>
