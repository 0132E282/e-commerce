@extends('include.layouts.admin-layout')

@php
    use App\Models\Brands;
    $curentUrl = Request::url();
    $brands = Brands::whereHas('products')->get();
@endphp
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @if (session()->has('message'))
                    @php $message = session()->get('message'); @endphp
                    <x-alert message="{{ $message['content'] }}" type="{{ $message['type'] }}" />
                @endif
            </div>
            <div class="card shadow p-4  ">
                <div class="row">
                    <div class="col-4">
                        <h4 class="fs-5 mb-4"> <span class="fw-bold">Sản phẩm : </span>{{ $product->name ?? '' }}</h4>
                        <ul class="list-group rounded-0 ">
                            <li class="py-1 list-group-item">Kho hàng : {{ $product?->variations->sum('quantity') ?? '' }}</li>
                            <li class="py-1 list-group-item">reivew : {{ $product?->views_count ?? '' }}</li>
                            <li class="py-1 list-group-item">Danh mục : {{ $product?->category->name ?? '' }}</li>
                            <li class="py-1 list-group-item">Đơn hàng : {{ 0 }} </li>
                            <li class="py-1 list-group-item">Đã bán : {{ 0 }}</li>
                            <li class="py-1 list-group-item">Ngày tạo : {{ $product?->created_at ?? '' }}</li>
                            <li class="py-1 list-group-item">Cập nhập : {{ $product?->updated_at ?? '' }}</li>
                        </ul>
                    </div>
                    <div class="col">
                        <div class="mb-4">
                            @if (!empty($product->feature_image))
                                <h4 class="fw-bold fs-6">Ảnh chi tiêt sản phẩm</h4>
                                <img class="img-thumbnail" src="{{ $product->feature_image ?? '' }}" alt="" style="width: 60px;">
                            @endif
                        </div>
                        <div class="mb-4 mt-2">
                            @if (!empty($product->description_image))
                                <h4 class="fw-bold fs-6">Ảnh ảnh mô tả sản phẩm</h4>
                                <div class="d-flex justify-content-start align-items-center gap-2">
                                    @foreach ($product->description_image as $image)
                                        <img class="img-thumbnail" src="{{ $image ?? '' }}" alt="" style="width: 60px; hieght:100%;">
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow" style="min-height:60vh;">
                <div class="card-header">
                    <div class="nav nav-tabs border-0" id="nav-tab" role="tablist">
                        <button class="nav-link border-0 active" id="nav-home-tab" data-toggle="tab" data-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Mô tả</button>
                        <button class="nav-link border-0" id="nav-profile-tab" data-toggle="tab" data-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Thuộc tính</button>
                        <button class="nav-link border-0" id="nav-contact-tab" data-toggle="tab" data-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Người like</button>
                        <button class="nav-link border-0" id="nav-comment-tab" data-toggle="tab" data-target="#nav-comment" type="button" role="tab" aria-controls="nav-comment" aria-selected="false">Bình luận </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            {!! $product->content ?? 'không có dữ liệu' !!}
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <x-table :tableHead="['#', 'màu', 'kích thước', 'số lượng', 'giá', 'giá giảm']">
                                @if ($product?->variations->count() > 0)
                                    @foreach ($product?->variations as $key => $variation)
                                        <tr>
                                            <td> {{ ++$key }}</td>
                                            <td>{{ $variation->color }} </td>
                                            <td>{{ $variation->size }} </td>
                                            <td>{{ $variation->quantity }} </td>
                                            <td>{{ $variation->price }} </td>
                                            <td>{{ $variation->reduced_price }} </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </x-table>
                        </div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">Đang phát triển like</div>
                        <div class="tab-pane fade" id="nav-comment" role="tabpanel" aria-labelledby="nav-comment-tab">
                            <h5><span>bình luận :</span> {{ $product->reviews->count() }} điểm : {{ round($product->reviews->avg('rating')) }} / 5</h5>
                            <x-table.table-reviews :reviews="$product->reviews" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
