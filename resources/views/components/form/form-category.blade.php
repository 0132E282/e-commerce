@props(['action', 'method'=> 'post' ])
<x-Form action="{{$action}}" method="{{$method}}">
    <div class="mb-3">
        <x-InputForm name="name_category" heading="nhập tên category" placeholder="nhập thông tin" value="{{$detailCategory->name_category ?? ''}}" />
    </div>
    <div class="mb-3">
        <x-SelectForm name="parent_id" :dataSelect="$dataCategory" />
    </div>
</x-Form>