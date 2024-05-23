@props(['name' => '', 'valueImage' => '', 'accept' => ''])

<label class="border border-3  input-image" style="cursor: pointer">
    <div class="load position-relative " style="max-width: 150px;">
        @if (empty($valueImage))
            <div class="p-5 ">
                <i class="bi bi-plus-circle fs-2 "></i>
            </div>
        @else
            <img class="w-100 h-100 " src="{{ asset($valueImage) }}" />
        @endif
    </div>
    <input type="file" hidden name="{{ $name }}">
</label>
