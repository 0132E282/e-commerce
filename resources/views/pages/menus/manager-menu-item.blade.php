@extends('include.layouts.admin-layout')
@php
    function categoryChildren($categoryChildrenList)
    {
        $checkboxHtml = '';
        foreach ($categoryChildrenList as $categoryChildren) {
            $checkboxHtml .= Blade::render("<x-input type='checkbox' value='$categoryChildren->id'  title='$categoryChildren->name' name='category[]' id='$categoryChildren->id' />");
            if ($categoryChildren->children->count() > 0) {
                $checkboxHtml .= "<div class='ms-4'>";
                $checkboxHtml .= $this->categoryChildren($categoryChildren->children);
                $checkboxHtml .= '</div>';
            }
        }
        return $checkboxHtml;
    }
@endphp

@section('content')
    <section class="content">
        <div class="container-fluid">
            @if (session()->has('message'))
                @php $message = session()->get('message'); @endphp
                <x-alert message="{{ $message['content'] }}" type="{{ $message['type'] }}" />
            @endif
            <div class="card shadow p-3 pb-5" style="min-height: 80vh;">
                <div class="d-flex justify-content-between align-items-center mb-3 ">
                    <x-button :link="route('admin.menus.index')">Quay lại</x-button>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header py-1" id="headingOne">
                                    <h2 class="mb-0 ">
                                        <button class="btn btn-link btn-block text-left text-black d-flex" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Danh mục sản phẩm
                                            <i class="bi bi-plus-circle ms-auto fs-5"></i>
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <x-form :action="route('admin.menus.item.create', ['id' => request()->id, 'type' => 1])" :custom="true">
                                            <div class="overflow-scroll ps-4" style="max-height: 300px;">
                                                @foreach ($categoryList as $key => $category)
                                                    <div class="ms-2">
                                                        <x-input type="checkbox" :title="$category->name" name="category[]" :value="$category->id" :id="$category->id . '_category'" />
                                                        @if ($category->children->count() > 0)
                                                            <div class="ms-4">
                                                                {!! categoryChildren($category->children) !!}
                                                            </div>
                                                        @endif
                                                    </div>
                                                @endforeach
                                            </div>
                                            <x-button type="submit" class="mt-3 w-100">Thêm vào</x-button>
                                        </x-form>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header py-1" id="headingOne">
                                    <h2 class="mb-0 ">
                                        <button class="btn btn-link btn-block text-left text-black d-flex" type="button" data-toggle="collapse" data-target="#brand" aria-expanded="true" aria-controls="brand">
                                            Nhản hiệu
                                            <i class="bi bi-plus-circle ms-auto fs-5"></i>
                                        </button>
                                    </h2>
                                </div>
                                <div id="brand" class="collapse " aria-labelledby="brand" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <x-form :action="route('admin.menus.item.create', ['id' => request()->id, 'type' => 4])" :custom="true">
                                            <div class="overflow-scroll ps-4" style="max-height: 300px;">
                                                @foreach ($brands as $brand)
                                                    <x-input type="checkbox" :title="$brand->name" name="brands[]" :value="$brand->id" :id="$brand->id . '_category'" />
                                                @endforeach
                                            </div>
                                            <x-button type="submit" class="mt-3 w-100">Thêm vào</x-button>
                                        </x-form>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header py-1" id="headingTwo">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left text-black collapsed d-flex" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            liên kết tới trang
                                            <i class="bi bi-plus-circle ms-auto fs-5"></i>
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <x-form :action="route('admin.menus.item.create', ['id' => request()->id, 'type' => 2])" :custom="true">
                                            <div class="overflow-scroll  ps-5" style="max-height: 300px;">
                                                @foreach ($routes as $routes)
                                                    <x-input type="checkbox" :value="$routes->getName()" :title="str_replace('client.', '', $routes->getName())" name="routeName[]" :id="$routes->getName() . '_category'" />
                                                @endforeach
                                            </div>
                                            <x-button type="submit" class="mt-3 w-100">Thêm vào</x-button>
                                        </x-form>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header py-1" id="headingThree">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left text-black  collapsed  d-flex " type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            tùy chỉnh
                                            <i class="bi bi-plus-circle ms-auto fs-5"></i>
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <x-form :action="route('admin.menus.item.create', ['id' => request()->id, 'type' => 3])" :custom="true">
                                            <x-input title="Tiêu đề" name="title" />
                                            <x-input title="Links" name="links" />
                                            <x-button type="submit" class="mt-3 w-100">Thêm vào</x-button>
                                        </x-form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <x-table.table-menu-items :menuItems="$menuItems" />
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('modal')
    <x-modal.modal-message id="delete_message" btnTitle="xóa" title="Xóa sản phẩm" content="Bạn đồng ý xóa không" />
    <x-menus.modal-form-menu-items />
@endsection
