@if(isset($dataTable) && count($dataTable) > 0)
<table class="table">
    <thead>
        <tr>
            @foreach($columnNames as $value)
            <td>{{$value}}</td>
            @endforeach
        </tr>
    </thead>
    <tbody>
        {{$slot}}
    </tbody>
</table>
<div>
    {{empty($dataTable->links()) ? $dataTable->links() : ''}}
</div>
@else
<div>
    <x-Alert message="không có dữ liệu" class="text-center  alert-primary py-3" />
</div>
@endif