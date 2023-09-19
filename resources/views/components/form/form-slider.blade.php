@props(['action' , 'method'=> 'post'])
<x-Form action="{{$action}}" method="{{$method}}">
    <div class="mb-3">
        <x-inputForm type="text" value="{{$sliderDetails->name_slider ?? ''}}" name="name_slider" title="tên slider" />
    </div>
    <div class="mb-3">
        <x-inputForm type="text" value="{{$sliderDetails->description_slider ?? ''}}" name="description_slider" title="mô tả " />
    </div>
    <div class="mb-3 ">
        <x-inputForm name="image_url" type="file" title="mô tả" />
        @if(isset($sliderDetails->image_url)) <img src="{{$sliderDetails->image_url ?? ''}}" alt=""> @endif
    </div>
</x-Form>