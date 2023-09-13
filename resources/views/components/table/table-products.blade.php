<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">hình</th>
            <th scope="col">tên sản phẩm</th>
            <th scope="col">giá sản phẩm</th>
            <th scope="col">loại sản phẩm</th>
            <th scope="col">ngày tạo</th>
            <th scope="col">setting </th>
        </tr>
    </thead>
    <tbody>
        @foreach($dataTable as $key => $value)
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <th style="width: 80px; height: auto;">
                <img src="{{$value->feature_image}}" onerror="this.src='/assets/default-images/empty_product.jpg';" class="img-thumbnail" alt="{{$value->name_product}}">
            </th>
            <td style="max-width: 200px;">
                <p class="ellipsis" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="This top tooltip is themed via CSS variables.">
                    {{$value->name_product}}
                </p>
            </td>
            <td>{{number_format($value->price_product)}}</td>
            <td>{{$value->name_category}}</td>
            <td>{{date("Y/m/d",strtotime($value->created_at))}} </td>
            <td>
                @if(Route::currentRouteName() == 'trash-product')
                <x-Button method="post" action="{{route('restore-product',$value->id_product)}}" class="btn btn-warning">
                    <i class="bi bi-arrow-counterclockwise"></i>
                </x-Button>
                <x-Button data-value="{{route('restore-product',$value->id_product)}}" id="btnModalMassage" data-bs-toggle="modal" data-bs-target="#modalMassage" class="btn-danger">
                    <i class="bi bi-trash-fill"></i>
                </x-Button>
                @else
                <x-Button link="{{route('update-product',$value->id_product)}}" class="btn btn-warning">
                    <i class="bi bi-pencil-square"></i>
                </x-Button>
                <x-Button data-value="{{route('delete-product',$value->id_product)}}" id="btnModalMassage" data-bs-toggle="modal" data-bs-target="#modalMassage" class="btn-danger">
                    <i class="bi bi-trash-fill"></i>
                </x-Button>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div>
    {{$dataTable->links()}}
</div>