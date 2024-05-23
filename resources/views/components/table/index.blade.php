@props(['isNextPage' => true, 'tableHead' => [], 'id' => ''])
@php
    $curentRoute = Route::current();
@endphp
<table class="table m-0 ">
    <thead class="table-light">
        <tr class="text-center fw-bold">
            @foreach ($tableHead as $column)
                <td class="text-start" scope="col">
                    @if (!empty($column['order']))
                        @php
                            $order = ['by' => 'ASC', 'icon' => 'bi bi-sort-alpha-down'];
                            if (request()->by == 'ASC' && request()->order == $column['order']) {
                                $order = ['by' => 'DESC', 'icon' => 'bi  bi-sort-alpha-up'];
                            }
                            $routeOrderBy = route($curentRoute->getName(), [...$curentRoute->parameters(), 'order' => $column['order'], 'by' => $order['by']]);
                        @endphp
                        <a class="fw-bold text-black text-start" href="{{ $routeOrderBy }}">
                            {{ $column['col_name'] }}
                            <i class="{{ $order['icon'] }}"></i>
                        </a>
                    @else
                        {{ $column['col_name'] ?? $column }}
                    @endif
                </td>
            @endforeach
        </tr>
    </thead>
    <tbody class="table-group-divider {{ !empty($id) ? 'load-table-' . $id : '' }}">
        {{ $slot }}
    </tbody>
</table>
@if (!empty($dataTable))
    <div>
        {{ $dataTable?->links() }}
    </div>
@endif
