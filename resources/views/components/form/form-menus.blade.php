@props(['action', 'method' => 'post'])
<x-Form action="{{ $action }}" method="{{ $method }}">
    <div class="mb-3">
        <x-InputForm name="name_menus" title="tên đường dẫn" heading="tên menus" value="{{ $detailsMenus->name_menus ?? '' }}" placeholder="nhập thông tin" />
    </div>
    <div class="mb-3">
        <p>đương dân liên kết</p>
        <select class="form-select route-link" aria-label="Default select example">
            <option disabled selected>đường dẫn liên kết</option>
            @foreach ($routes as $key => $value)
                <option value="{{ $value->uri }}">{{ $value->getName() }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <x-InputForm name="route" title="đường dẫn" heading="đường dân " value="{{ $detailsMenus->route ?? '' }}" placeholder="nhập thông tin" />
    </div>

    <div class=" mb-3">
        <x-SelectForm name="parent_id" title="liên kết với thẻ cha" :dataSelect="$dataMenuSelect" />
    </div>
</x-Form>
<script type="module">
    $(document).ready(function() {
        $('.route-link').on('change', function() {
            const route = this.value === '/' ? 'http://' + window.location.host + '/' : 'http://' + window.location.host + '/' + this.value;
            $('input[name="route"]').val(route);
        })
    });
</script>
