<div class="d-flex align-items-center  justify-content-between ">
    <div class="d-flex  justify-content-center  align-items-center  ">
        @if (!empty($page))
            <div class="px-1 me-3 d-flex border bg-white rounded  justify-content-center align-items-center  border-1 border-black ">
                <a href="{{ $page->url(1) }}" class=" align-items-center  d-flex  justify-content-center  bg-transparent border-0 "><i class="bi bi-chevron-double-left text-black shadow-none accordion "></i></a>
                <a href="{{ $page->previousPageUrl() }}" class=" align-items-center  d-flex  justify-content-center  bg-transparent border-0 "><i class="bi bi-chevron-left text-black shadow-none accordion "></i></a>
                <select class="form-select border-0 bg-transparent shadow-none" style="width: 60px; -webkit-appearance: none; -moz-appearance: none;">
                    @foreach ($page->getUrlRange(1, $page->lastPage()) as $key => $item)
                        <option value="{{ $item }}" {{ $page->currentPage() === $key ? 'selected' : '' }}>
                            {{ $key }}
                        </option>
                    @endforeach
                </select>
                <a href="{{ $page->nextPageUrl() }}" class=" align-items-center  d-flex justify-content-center bg-transparent border-0 "><i class="bi bi-chevron-right text-black "></i></a>
                <a ahref="{{ $page->url($page->lastPage()) }}" class=" align-items-center  d-flex  justify-content-center  bg-transparent border-0 "><i class="bi bi-chevron-double-right text-black shadow-none accordion "></i></a>
            </div>
            <div class="d-flex  justify-content-start  align-items-center me-2 ">
                <h5 class="me-1 text-sm  me-1 mb-0">số lượng :</h5>
                <select class="form-select " style="width: 80px;" onchange="handleChangeSortProduct(event)">
                    @foreach ($limit['list_actions'] as $key => $value)
                        <option {{ !empty($param['limit']) && $param['limit'] == $value['value'] ? 'selected' : '' }} value="{{ Route(Route::currentRouteName(), ['limit' => $value['value']] + $param) }} ">{{ $value['value'] }}</option>
                    @endforeach
                </select>
            </div>
        @endif
        @if (!empty($sort && is_array($sort)))
            <div class="d-flex  justify-content-start  align-items-center me-2 ">
                <h5 class="me-1 text-sm  me-1 mb-0">sấp xếp :</h5>
                <select class="form-select " style="width: 200px;" onchange="handleChangeSortProduct(event)">
                    @foreach ($sort as $key => $value)
                        <option {{ !empty($param['sort_by']) && $param['sort_by'] == $value['value'] ? 'selected' : '' }} value="{{ Route(Route::currentRouteName(), ['sort_by' => $value['value']] + $param) }} ">{{ $value['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="d-flex  justify-content-start  align-items-center me-2" onchange="handleChangeSortProduct(event)">
                <h5 class="me-1 text-sm  me-1 mb-0">sấp xếp theo:</h5>
                <select class="form-select " style="width: 100px;">
                    @foreach ($sort_order as $key => $value)
                        <option {{ !empty($param['sort_order']) && $param['sort_order'] == $value['value'] ? 'selected' : '' }} value="{{ Route(Route::currentRouteName(), ['sort_order' => $value['value']] + $param) }} ">{{ $value['name'] }}</option>
                    @endforeach
                </select>
            </div>
        @endif
        @if (!empty($sortType))
            <div class="d-flex  justify-content-start  align-items-center me-2 ">
                <h5 class="me-1 text-sm  me-1 mb-0">loại :</h5>
                <select class="form-select " style="width: 200px;" onchange="handleChangeSortProduct(event)">
                    @foreach ($sortType as $key => $value)
                        <option {{ !empty($param['type']) && $param['type'] == $value['value'] ? 'selected' : '' }} value="{{ Route(Route::currentRouteName(), ['type' => $value['value']] + $param) }} ">{{ $value['name'] }}</option>
                    @endforeach
                </select>
            </div>
        @endif
    </div>

    <div class="flex align-items-center  justify-content-center  ">
        <x-button action="{{ route(preg_replace('/\.(.+)/i', '.export-excel', Route::currentRouteName())) }}" class="mr-2 mb-0 " type="submit" enctype="multipart/form-data"> export excel </x-button>
        <x-button class="h-25 me-2 " data-bs-toggle="modal" data-bs-target="#file-excel"> import excel </x-button>
        {{-- <x-button class="btn h-25 btn-warning me-2 ">
            <i class="bi bi-pencil-square"></i>
        </x-Button>
        <x-Button data-method="delete" data-bs-toggle="modal" data-bs-target="#delete_message" class="btn-danger h-25">
            <i class="bi bi-trash-fill"></i>
        </x-Button> --}}
    </div>
</div>
<script>
    function handleChangeSortProduct(e) {
        console.log(e)
        window.location = e.target.value;
    }
</script>
