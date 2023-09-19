@props(['columnNames' => ['#' , 'hình ảnh' , 'tên', 'ngày tạo' , 'action'] ])
<x-Table :columnNames="$columnNames" :dataTable="$dataTable">
    @foreach($dataTable as $item)
    <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <th style="width: 80px; height: auto;">
            <img src="{{$item->image_url}}" onerror="this.src='/assets/default-images/empty_product.jpg';" class="img-thumbnail" alt="{{$item->name_product}}">
        </th>
        <td>{{$item->name_slider}}</td>

        <td>{{date("Y/m/d",strtotime($item->created_at))}}</td>
        <td>
            @if(Route::currentRouteName() == 'trash-slider')
            <x-Button method="POST" action="{{route('restore-slider',$item->id_slider)}}" class="btn btn-warning">
                <i class="bi bi-arrow-counterclockwise"></i>
            </x-Button>
            <x-Button method="delete" action="{{route('destroy-slider',$item->id_slider)}}" class="btn-danger">
                <i class="bi bi-trash-fill"></i>
            </x-Button>
            @else
            <x-Button link="{{route('update-slider',$item->id_slider)}}" class="btn btn-warning">
                <i class="bi bi-pencil-square"></i>
            </x-Button>
            <x-Button data-value="{{route('delete-slider',$item->id_slider)}}" id="btnModalMassage" data-bs-toggle="modal" data-bs-target="#modalMassage" class="btn-danger">
                <i class="bi bi-trash-fill"></i>
            </x-Button>
            @endif
        </td>
    </tr>
    @endforeach
</x-Table>