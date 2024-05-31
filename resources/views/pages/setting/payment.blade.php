@extends('/include/layouts/admin-layout')
@section('content')
    <!-- Main content -->
    <section class="content">
        @if (session()->has('message'))
            @php $message = session()->get('message'); @endphp
            <x-alert message="{{ $message['content'] }}" type="{{ $message['type'] }}" />
        @endif
        <div class="container-fluid">
            <div class="card p-4">
                <x-form :custom="true">
                    <div class="accordion" id="payment">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left d-flex align-items-center" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <img style="width: 50px;" src="{{ asset('web/assets/images/payment/momo-logo-ED8A3A0DF2-seeklogo.com.png') }}" alt="">
                                        <p class=" ms-2 mb-0">Thiết lập thanh toán momo</p>
                                    </button>
                                    <div class="ms-auto">

                                    </div>
                                </h2>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#payment">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-2"><label for="">endpoint </label></div>
                                                <div class="col"><x-input :value="$payment['momo']['endpoint'] ?? ''" name="payment[momo][endpoint]" placeholder="https://test-payment.momo.vn/...." /></div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-2"><label for="">secretKey</label></div>
                                                <div class="col"><x-input :value="$payment['momo']['secretKey'] ?? ''" name="payment[momo][secretKey]" placeholder="at67qH6mk8w5Y1n..." /></div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-2"><label for="">accessKey</label></div>
                                                <div class="col"><x-input :value="$payment['momo']['accessKey'] ?? ''" name="payment[momo][accessKey]" placeholder="klm05TvNBz..." /></div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-2"><label for="">partnerCode</label></div>
                                                <div class="col"><x-input :value="$payment['momo']['partnerCode'] ?? ''" name="payment[momo][partnerCode]" placeholder="MOMOBKUN20..." /></div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-2"><label for="">ipnUrl</label></div>
                                                <div class="col"><x-input :value="$payment['momo']['ipnUrl'] ?? ''" name="payment[momo][ipnUrl]" placeholder="https://webhook.site..." /></div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                    <button class="btn btn-link d-flex align-items-center btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <img style="width: 50px;" src="{{ asset('web/assets/images/payment/vnpay-logo-vinadesign-25-12-57-55.jpg') }}" alt="">
                                        <p class=" ms-2 mb-0">Thiết lập thanh toán vnpay</p>
                                    </button>
                                    <div>
                                    </div>
                                </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#payment">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-2"><label for="">vnp_HashSecret</label></div>
                                                <div class="col"><x-input :value="$payment['vnpay']['vnp_HashSecret'] ?? ''" name="payment[vnpay][vnp_HashSecret]" placeholder="XNBCJFAKAZQSGTARRL.." /></div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-2"><label for="">vnp_TmnCode</label></div>
                                                <div class="col"><x-input :value="$payment['vnpay']['vnp_TmnCode'] ?? ''" name="payment[vnpay][vnp_TmnCode]" placeholder="https://.." /></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h2 class="mb-0">
                                    <button class="btn d-flex align-items-center btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <img style="width: 50px;" src="{{ asset('web/assets/images/payment/shipcod.png') }}" alt="">
                                        <p class=" ms-2 mb-0">Mặt định</p>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#payment">
                                <div class="card-body">
                                    mặt định
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <x-button type="submit">Lưu</x-button>
                    </div>
                </x-form>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
