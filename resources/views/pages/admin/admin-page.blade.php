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
                    <div class="card" style="min-height: calc(100% - 20px);">
                        <div class="card-header border-0">
                            <h3 class="card-title">Top sản phẩm bán chạy</h3>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <x-table.index :tableHead="['sản phẩm', 'danh mục', 'đã bán', 'thành tiền']">
                                    @foreach ($TopProducts as $product)
                                        <tr>
                                            <td class="overflow-hidden" style=" max-width: 200px; text-wrap: nowrap;text-overflow: ellipsis;">
                                                <p class="ms-2"> {{ $product->name }}</p>
                                            </td>
                                            <td class="overflow-hidden" style="  max-width: 200px;text-wrap: nowrap;text-overflow: ellipsis;">{{ $product->category->name }}</td>
                                            <td class="overflow-hidden" style="  max-width: 200px;text-wrap: nowrap;text-overflow: ellipsis;">{{ $product->total_quantity }}</td>
                                            <td class="overflow-hidden" style="  max-width: 200px;text-wrap: nowrap;text-overflow: ellipsis;">{{ number_format($product->total_sales) }} đ</td>
                                        </tr>
                                    @endforeach
                                </x-table.index>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-secondary float-right">xem tất cả</a>
                        </div>
                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="card " style="height: calc(100% - 20px);">
                        <div class="card-header border-0">
                            <h3 class="card-title">Top danh mục bán chậy</h3>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <x-table.index :tableHead="['danh mục', 'số lượng sản phẩm', 'đã bán', 'thành tiền']">
                                    @foreach ($topCategory as $category)
                                        <tr>
                                            <td class="overflow-hidden" style=" max-width: 200px; text-wrap: nowrap;text-overflow: ellipsis;">
                                                <p class="ms-2"> {{ $category->name }}</p>
                                            </td>
                                            <td class="overflow-hidden" style="max-width: 200px;text-wrap: nowrap;text-overflow: ellipsis;">{{ $category->products->count() }}</td>
                                            <td class="overflow-hidden" style="max-width: 200px;text-wrap: nowrap;text-overflow: ellipsis;">{{ $category->total_quantity }}</td>
                                            <td class="overflow-hidden" style="  max-width: 200px;text-wrap: nowrap;text-overflow: ellipsis;">{{ number_format($category->total_sales) }} đ</td>
                                        </tr>
                                    @endforeach
                                </x-table.index>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-secondary float-right">xem tất cả</a>
                        </div>
                    </div>
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
