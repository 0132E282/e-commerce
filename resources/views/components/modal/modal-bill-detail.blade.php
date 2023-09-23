<!-- Modal -->
<x-modal.index id="detail_product" size="xl">
    <x-slot:header>
        đơn hàng chi tiết
    </x-slot:header>
    <x-slot:body>
        <div class="row">
            <div class="col-6">
                <ul class="list-group information-bill">

                </ul>
            </div>
            <div class="col-6">
                <div class="product-list scrollbar" style="max-height: 400px;">
                </div>
            </div>
        </div>
    </x-slot:body>
    <x-slot:action>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">thoát</button>
        <button type="button" class="btn btn-primary btn-save">lưu</button>
    </x-slot:action>
</x-modal.index>

<script type="module">
    $(document).ready(function() {
        $('.btn-save').on('click', function(e) {
            alert('tính năng chưa phát triển')
        });
        $('#detail_product').on('shown.bs.modal', e => {
            const value = $(e.relatedTarget).data('value');
            $.get(value, function(data) {
                const total = data.order_items.reduce((total, value) => {
                    return total + (value.products.price_product * value.quantity);
                }, 0);
                $('.information-bill').html(`
                <li class="list-group-item" aria-disabled="true">tên : ${data.customers?.name}</li>
                <li class="list-group-item">số điện thoại : ${data.customers?.phone_number}</li>
                <li class="list-group-item">địa chỉ : ${data.customers?.address}</li>
                <li class="list-group-item">email : ${data.customers?.email}</li>
                <li class="list-group-item">phí nhíp : free</li>
                <li class="list-group-item">ngày tạo : ${data.created_at}</li>
                <li class="list-group-item">trạng thái đơn hàng : ${data.status}</li>
                <li class="list-group-item">tổng : ${total.toLocaleString('en-US')} vnđ</li>
                `);
                const productList = data.order_items.map((item) => {
                    return ` 
                     <div class="item">
                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-md-2">
                                    <div style="width: 80px;">
                                        <img src="${item.products?.feature_image}" class="img-fluid rounded-start" alt="...">
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="card-body py-2">
                                        <h5 class="ellipsis">${item.products?.name_product}</h5>
                                        <p class="card-text d-flex mt-2">
                                            <span>${item.products?.price_product.toLocaleString('en-US')} x ${item.quantity}</span>
                                            <span class="ms-auto ">${(item.products?.price_product * item.quantity).toLocaleString('en-US')} vnd</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`;
                }).join('');
                $('.product-list').html(productList);
            });
        });
    })
</script>
