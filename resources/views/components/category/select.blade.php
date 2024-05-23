@props(['name' => '', 'heading' => 'Danh mục cha', 'id_active' => '', 'label' => ''])

@php
    function optionChildren($categoryChildren, $id_active = null, $level = '--')
    {
        $optionHtml = '';
        if ($categoryChildren->count() > 0) {
            foreach ($categoryChildren as $categoryChill) {
                $selected = $id_active == $categoryChill->id ? 'selected' : '';
                $optionHtml .= "<option value='{$categoryChill->id}' $selected>{$level}| {$categoryChill->name}</option>";
                if ($categoryChill->children->count() > 0) {
                    $optionHtml .= optionChildren($categoryChill->children, $id_active, $level . '--');
                }
            }
        }

        return $optionHtml;
    }
@endphp
<div class="form-group m-0">
    @if (!empty($label))
        <label>{{ $label }} </label>
    @endif
    <select class="select2 form-control" name="{{ $name ?? '' }}">
        <option value="">{{ $heading ?? '' }}</option>
        @if (!empty($categoryList) && $categoryList->count() > 0)
            @foreach ($categoryList as $category)
                @php
                    $selected = $id_active == $category->id ? 'selected' : '';
                @endphp
                <option value="{{ $category->id }}" {{ $selected }}>{{ $category->name }}</option>
                @if ($category->children->count() > 0)
                    {!! optionChildren($category->children, $id_active) !!}
                @endif
            @endforeach
        @endif
    </select>
</div>
@error($name)
    <p class="fs-6 py-1 text-danger">{{ $message }}</p>
@enderror
