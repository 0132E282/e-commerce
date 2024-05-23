<label for="" class="mb-4">Tùy biến sản phẩm</label>
<div class="col-4">
    <div class="form-group">
        <div class="row">
            <div class="col-3">
                <label for="">Kích thước</label>
            </div>
            <div class="col">
                <x-select.tags class="attr" data-name="size" placeholder="nhập kích thước quần áo">
                    @if (!empty($variants))
                        @foreach ($variants->pluck('size')->unique()->toArray() as $size)
                            <option value="{{ $size }}" selected>{{ $size }}</option>
                        @endforeach
                    @endif
                </x-select.tags>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-3">
                <label for="">Màu</label>
            </div>
            <div class="col">
                <x-select.tags class="attr" data-name="color" placeholder="nhập màu sắt cho quần áo">
                    @if (!empty($variants))
                        @foreach ($variants->pluck('color')->unique()->toArray() as $color)
                            <option value="{{ $color }}" selected>{{ $color }}</option>
                        @endforeach
                    @endif
                </x-select.tags>
            </div>
        </div>
    </div>
</div>
<div class="col">
    <div class="d-flex justify-content-end  align-items-center mb-3 ">
        <div class="col">
            <x-input data-input-multiplle="price" type="number" placeholder="giá sản phẩm" />
        </div>
        <div class="col">
            <x-input data-input-multiplle="sale" type="number" placeholder="giá giảm phẩm" />
        </div>
        <div class="col">
            <x-input data-input-multiplle="quantity" type="number" placeholder="số lượng sản phẩm" />
        </div>
        <x-button class="btn-click-multiple">Tạo nhanh</x-button>
    </div>
    <x-table.index :tableHead="['kích thước', 'màu sắc', 'giá tiền', 'giá giảm', 'số lượng', '']" id="attr">
        @if (!empty($variants))
            @foreach ($variants as $key => $variant)
                <tr onclick="handleClickRow(event)">
                    <td style="max-width: 100px;">
                        <x-input style="outline: none;" readonly class="border-0 w-100 " type="text" name="attr[{{ $key }}][size]" value="{{ $variant->size }}" />
                    </td>
                    <td style="max-width: 100px;">
                        <x-input class="border-0 w-100 " readonly style="outline: none;" type="text" name="attr[{{ $key }}][color]" value="{{ $variant->color }}" />
                    </td>
                    <td>
                        <x-input data-input="price" type="text" name="attr[{{ $key }}][price]" value="{{ $variant->price }}" />
                    </td>
                    <td>
                        <x-input data-input="sale" type="text" name="attr[{{ $key }}][sale]" value="{{ $variant->reduced_price }}" />
                    </td>
                    <td>
                        <x-input data-input="quantity" type="text" name="attr[{{ $key }}][quantity]" value="{{ $variant->quantity }}" />
                    </td>
                    <td>
                        <x-button class="delete-btn">xóa </x-button>
                    </td>
                </tr>
            @endforeach
        @endif
    </x-table.index>
</div>
@push('scripts-form-product')
    <script>
        /**
         *  params attr (array) : lấy tất các ô input đã cho 
         *  params index (int): ví trí bắt đầu lấy dữ liệu 
         *  valueAttr (object): giá trị chuyền vào khi hàm tiếp theo có dữ liệu
         */
        function generateAtrribute(attr, index = 0, valueAttr = []) {
            const currentValueList = $(attr[index]).val();
            const currentValueName = $(attr[index]).data('name');

            const rel = [];
            const nextValueAttr = $(attr[index + 1]).val();
            if (currentValueList) {
                for (const currentValue of currentValueList) {
                    const data = {
                        [currentValueName]: currentValue
                    };
                    if (nextValueAttr?.length > 0) {
                        rel.push(...generateAtrribute(attr, index + 1, data));
                    } else {

                        rel.push({
                            ...data,
                            ...valueAttr
                        });
                    }
                }
            }
            return rel;
        }
        $('.attr').on('change', function() {
            const attr = $("select.attr").filter(function() {
                return $(this).val()?.length > 0;
            });
            if (attr) {
                const attrList = generateAtrribute(attr)
                const html = attrList.map(function(attr, key) {
                    return `<tr class="row-attr" onclick="handleClickRow(event)">
                    <td style="max-width: 100px;">
                        <x-input  style="outline: none;" readonly class="border-0 w-100 attr-size" type="text" name="attr[${key}][size]" value="${attr?.size || null}" />
                    </td>
                <td style="max-width: 100px;">
                    <x-input class="border-0 w-100 attr-color" readonly style="outline: none;" type="text" name="attr[${key}][color]" value="${attr?.color || null}" />
                </td>
                <td>
                    <x-input data-input="price" type="text" name="attr[${key}][price]" />
                </td>
                <td>
                    <x-input data-input="sale" type="text" name="attr[${key}][sale]" />
                </td>
                <td>
                    <x-input data-input="quantity"  type="text" name="attr[${key}][quantity]" />
                </td>
                <td>
                    <x-button class="delete-btn">xóa </x-button>
                </td>
            </tr>`
                }).join('\n')
                $('.load-table-attr').html(html);
            }
        })


        function handleClickRow(e) {
            if (e.target.closest('button.delete-btn')) {
                e.currentTarget.remove();
                const color = e.currentTarget.querySelector('input.attr-color')?.value;
                const size = e.currentTarget.querySelector('input.attr-size')?.value;
                const isNullColor = Array.from($('tr input.attr-color')).every(function(inputColor) {
                    return color !== inputColor.value
                });
                const isNullSize = Array.from($('tr input.attr-size')).every(function(inputColor) {
                    return size !== inputColor.value
                });
                if (isNullColor) {
                    $('select.attr[data-name="color"]').find(`option[value="${color}"]`).remove();
                }
                if (isNullSize) {
                    $('select.attr[data-name="size"]').find(`option[value="${size}"]`).remove();
                }
            }
        }
        $('.btn-click-multiple').on('click', function() {
            $('[data-input-multiplle]').each(function() {
                const value = $(this).val();
                $(`[data-input="${$(this).data('input-multiplle')}"]`).each(function() {
                    $(this).val(value);
                })
                $(this).val('');
            });
        });
    </script>
@endpush
