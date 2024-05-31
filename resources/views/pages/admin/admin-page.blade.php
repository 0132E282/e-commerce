@extends('include/layouts/admin-layout')
@php
    use Carbon\Carbon;
@endphp
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <x-admin.small-boxes />
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Thông kê đơn hàng </h3>
                                {{-- <a href="javascript:void(0);">View Report</a> --}}
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex">
                                <form class="d-flex" method="GET" :custom="true">
                                    <label class="me-2 mb-0">Ngày tạo :</label>
                                    <x-select style="width: 200px;" name="date">
                                        <option value="today">Hôm nay </option>
                                        <option value="yesterday">Hôm qua </option>
                                        <option value="last_7_days">7 ngày trước </option>
                                        <option value="last_30_days">1 tháng trước</option>
                                    </x-select>
                                    <x-button type="submit" class="ms-2" style=" height: 40px;">Tạo</x-button>
                                </form>

                                <p class="ml-auto d-flex flex-column text-right">
                                    <span class="text-success">
                                        <i class="fas fa-arrow-up"></i> 12.5%
                                    </span>
                                    <span class="text-muted">Since last week</span>
                                </p>
                            </div>
                            <!-- /.d-flex -->

                            <div class="position-relative mb-4">
                                <canvas id="visitors-chart" height="200"></canvas>
                            </div>

                            <div class="d-flex flex-row justify-content-end">
                                <span class="mr-2">
                                    <i class="fas fa-square text-primary"></i> Danh thu
                                </span>

                                <span class="mr-2">
                                    <i class="fas fa-square text-gray"></i> Danh số
                                </span>
                                <span class="mr-2">
                                    <i class="fas fa-square text-gray"></i> Trung bình mỗi đơn
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <x-admin.latest-orders :data="$topProductBill" />
                </div>
                <div class="col-lg-6">
                </div>
            </div>
    </section>
@endsection
@push('scripts')
    <script>
        const statistical = @js($statistical);
    </script>
    <script src="dist/js/pages/dashboard3.js"></script>
@endpush
