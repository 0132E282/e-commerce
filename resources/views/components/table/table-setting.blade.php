@props(['columnNames' => ['#' , 'key_setting' , 'value' , 'action'] ])
<x-Table :columnNames="$columnNames" :dataTable="$dataTable">
    @foreach($dataTable as $item)
    <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <th>
            {{$item->key_setting}}
        </th>
        <th>
            {{$item->value}}
        </th>
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