@if(isset($dataTable) && count($dataTable) > 0)

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">tên tên menus</th>
            <th scope="col">đường dẫn</th>
            <th scope="col">ngày tạo</th>
            <th scope="col">action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dataTable as $item)
        <tr>
            <th scope="row">{{$loop->iteration }}</th>
            <td>{{$item->name_menus}}</td>
            <td>{{$item->route}}</td>

            <td>{{date("Y/m/d",strtotime($item->created_at))}}</td>
            <td>
                @if(Route::currentRouteName() == 'trash-menus')
                <x-Button method="POST" action="{{route('restore-menus',$item->id_menus)}}" class="btn btn-warning">
                    <i class="bi bi-arrow-counterclockwise"></i>
                </x-Button>
                <x-Button method="delete" action="{{route('destroy-menus',$item->id_menus)}}" class="btn-danger">
                    <i class="bi bi-trash-fill"></i>
                </x-Button>
                @else
                <x-Button link="{{route('update-menus',$item->id_menus)}}" class="btn btn-warning">
                    <i class="bi bi-pencil-square"></i>
                </x-Button>
                <x-Button method="delete" action="{{route('delete-menus',$item->id_menus)}}" class="btn-danger">
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
@else
<div>
    <x-Alert message="không có dữ liệu" class="text-center  alert-primary py-3" />
</div>

@endif