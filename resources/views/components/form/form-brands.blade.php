@props(['method' => 'post', 'action' => ''])

<x-form :action="$action" :method="$method" :custom="true">
    <div class="mb-4">
        <x-input title="tên nhản hiệu" placeholder="Nhập tên nhản hiệu" name="name" :value="$brand->name ?? ''" />
    </div>
    <div class="mb-4">
        <x-textarea-form title="mô tả nhản hiệu" name="description" :value="$brand->description ?? ''" />
    </div>
    <x-button type="submit">{{ !empty($brand) ? 'cập nhập nhản hiêụ' : 'Tạo nhản hiệu' }} </x-button>
</x-form>
