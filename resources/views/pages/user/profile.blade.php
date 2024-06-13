@extends('include.layouts.admin-layout')

@php
    $curentUrl = Request::url();
    $menuRole = [
        [
            'title' => 'sản phẩm đã tạo',
            'id' => 'products',
            'key_code' => 'VIEW_PRODUCT',
        ],
    ];
    $orders = $user->orders()->paginate(10);
    $reviews = $user->reviews()->paginate(10);
    $products = $user->products()->paginate(10);
@endphp
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="{{ $user->avatar_url }}" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{ $user->name }}</h3>

                            <p class="text-muted text-center">{{ optional($user->roles->first())->name }}</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Đơn hàng</b> <a class="float-right">{{ $user->orders->count() }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Đánh giá </b> <a class="float-right">{{ $user->reviews->count() }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thông tin </h3>
                        </div>
                        <div class="card-body">
                            <strong><i class="fas fa-book mr-1"></i> Email</strong>

                            <p class="text-muted">
                                {{ $user->email }}
                            </p>

                            <hr>

                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Ngày tạo</strong>

                            <p class="text-muted"> {{ $user->created_at }}</p>

                            <hr>

                            <strong><i class="fas fa-pencil-alt mr-1"></i> Quyền admin</strong>

                            <p class="text-muted">
                                @foreach ($user->roles as $role)
                                    <span class="tag tag-danger">{{ $role->name }}</span>
                                @endforeach
                            </p>
                        </div>
                        <div class="px-3 py-2">
                            <a href="{{ route('admin.users.update', ['id' => $user->id]) }}" class="btn btn-primary btn-block"><b>Chỉnh sửa</b></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-tabs border-0" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active  border-0 " id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Đơn hàng</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link border-0" id="profile-tab" data-toggle="tab" data-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Đánh giá </button>
                                </li>
                                @foreach ($menuRole as $menu)
                                    @can($menu['key_code'])
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link border-0" id="{{ $menu['id'] }}-tab" data-toggle="tab" data-target="#{{ $menu['id'] }}" type="button" role="tab" aria-controls="{{ $menu['id'] }}"
                                                aria-selected="false">{{ $menu['title'] }}</button>
                                        </li>
                                    @endcan
                                @endforeach
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <x-table.table-order :orders="$orders" />
                                    <div class="mt-4">
                                        {{ $orders->links() }}
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <x-table.table-reviews :reviews="$reviews" />
                                    <div class="mt-4">
                                        {{ $reviews->links() }}
                                    </div>
                                </div>
                                @can('VIEW_PRODUCT')
                                    <div class="tab-pane fade" id="products" role="tabpanel" aria-labelledby="products-tab">
                                        <x-table.table-products :products="$products" />
                                        <div class="mt-4">
                                            {{ $products->links() }}
                                        </div>
                                    </div>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
