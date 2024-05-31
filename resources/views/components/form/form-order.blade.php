@props(['action' => null, 'order' => [], 'textButton' => ''])
<x-form id="form-checkout" :action="route('client.order.create')" method="post" custom="{{ true }}">
    <div class="row">
        <div class="col-sm-7 ">
            <div class="shopper-info">
                <p style="margin-bottom: 20px;">Thông tin đặt hàng</p>
                <div style="margin-bottom: 20px;">
                    <x-input name="fullname" placeholder="nhập họ và tên" />
                </div>
                <div style="margin-bottom: 20px;">
                    <x-input name="phone" placeholder="số điện thoại" />
                    {{-- <p style="margin-top: 10px; font-size: 14px; color: red;">Hoomh yin tsfsdf</p> --}}
                </div>
                <div style="margin-bottom: 20px;">
                    <x-input type="email" name="email" placeholder="email" :value="optional($order)->email" />
                </div>
                <x-select.provinces :address="json_decode(optional($order)->address, true)" />
            </div>
            <div style="margin-bottom: 20px;">
                <div class="order-message">
                    <textarea name="note" style="width:100%; height: 100px; outline: none; border-radius: 4px;" maxlength="255" placeholder="Nghi chú đơn hàng nếu có yêu cầu khác"></textarea>
                </div>
            </div>

            <x-button class="btn" style="margin-bottom:20px; " type="submit">{{ $textButton }}</x-button>
        </div>
        @if (Route::currentRouteName() === 'client.shop.checkout')
            <div class="col-sm-5">
                <div style="margin-bottom: 20px;">
                    <p style="margin-bottom: 20px; font-size: 18px;">Phương thức thanh toán</p>
                    <label class="btn btn-default btn-checkbox" style="width: 100%; display: inline-flex; justify-content:start; align-items:center;margin-bottom: 20px;">
                        <img style="max-width: 40px; margin-right: 10px;" src="{{ asset('web/assets/images/payment/shipcod.png') }}" alt="">
                        <span style="font-weight: 500;">Thanh toán khi nhận hàng </span>
                        <input name="payment" value="" checked type="radio" hidden>
                    </label>
                    <label class="btn btn-default btn-checkbox"style="width: 100%; display: inline-flex; justify-content:start; align-items:center;margin-bottom: 20px;">
                        <img style="max-width: 40px; margin-right: 10px; border-radius: 4px;" src="{{ asset('web/assets/images/payment/vnpay-logo-vinadesign-25-12-57-55.jpg') }}" alt="">
                        <span style="font-weight: 500;">Thanh toán khi qua vnpay</span>
                        <input name="payment" value="VN_PAY" type="radio" hidden>
                    </label>
                    <label class="btn btn-default btn-checkbox " style="width: 100%; display: inline-flex; justify-content:start; align-items:center;">
                        <img style="max-width: 40px; margin-right: 10px;" src="{{ asset('web/assets/images/payment/momo-logo-ED8A3A0DF2-seeklogo.com.png') }}" alt="">
                        <span style="font-weight: 500;">Thanh toán qua Momo</span>
                        <input name="payment" value="MOMO" type="radio" hidden>
                    </label>
                </div>
            </div>
        @endif
    </div>
</x-form>

@push('scripts')
    <script>
        $('#form-checkout').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                method: 'POST',
                data: $(this).serialize(),
                success: function(res) {
                    console.log(res);
                    if (res.payment != null) {
                        window.location.href = res.payment.payUrl
                    } else {
                        window.location.href = `{{ route('client.order.rel-checkout', ':id') }}`.replace(':id', res.data.id);
                    }
                    e.currentTarget.reset();
                },
                error: function(err) {
                    toastr.error(err);
                }
            })
        });
    </script>
@endpush
