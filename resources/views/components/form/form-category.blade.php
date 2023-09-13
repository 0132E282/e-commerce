<form action="{{$detailCategory ? route('update-category' ,$detailCategory->id_category ) : route('create-category')}}" method="post">
    @csrf
    @if($detailCategory) @method('put') @endif
    <div class="mb-3">
        <x-InputForm name="name_category" heading="nhập tên category" placeholder="nhập thông tin" value="{{$detailCategory->name_category ?? ''}}" />
    </div>

    <div class="mb-3">
        <x-SelectForm name="parent_id" :dataSelect="$dataCategory" />
    </div>
    <x-Button type="submit">submit</x-Button>
</form>