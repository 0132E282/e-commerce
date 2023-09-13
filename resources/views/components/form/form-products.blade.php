@props(['route' , 'method' => 'POST'])
<form action="{{$route}}" method="post" enctype="multipart/form-data">
    @csrf
    @method($method)
    <div class="mb-3">
        <x-inputForm name="name_product" value="{{$dataForm->name_product ?? ''}}" title="nhập tên sản phẩm" />
    </div>
    <div class="mb-3 ">
        <x-EkEditor name="content" value="{{$dataForm->content ?? ''}}" title="nội dung" />
    </div>
    <div class="mb-3 ">
        <x-inputForm name="feature_image" type="file" title="ảnh sản phẩm" />
        @if(isset($dataForm->feature_image)) <img src="{{$dataForm->feature_image ?? ''}}" class="rounded  d-block mt-2" alt="..." style="max-width: 100px;"> @endif
    </div>
    <div class="mb-3 ">
        <x-inputForm name="product_images[]" type="file" multiple title="sản phẩm mô tả" />
        <div class="row">
            @if(isset($dataForm['images']))
            @foreach($dataForm['images'] as $image)
            <div class="col-1">
                <img src="{{$image->path ?? ''}}" class="rounded  d-block mt-2" alt="..." style="max-width: 100px;">
            </div>
            @endforeach
            @endif
        </div>
    </div>
    <div class="mb-3">
        <x-inputForm name="price_product" value="{{$dataForm->price_product ?? ''}}" title="giá sản phẩm" />
    </div>
    <div class="mb-3 ">
        <x-SelectForm name="id_category" :dataSelect="$dataCategory" titleOptions="danh mục cha" />
    </div>
    <div class="mb-3 ">
        <x-TagsSelect name="tags_products[]" :dataTagsSelect="$dataForm->tags ??[]" title="chọn tags" />
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>