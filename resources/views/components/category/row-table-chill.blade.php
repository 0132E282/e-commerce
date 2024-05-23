@props(['categoryChill' => [], 'level' => '--'])
@foreach ($categoryChill as $category)
    <x-category.row-table :category="$category" :row="$level" />
    @if ($category->children->count() > 0)
        <x-category.row-table-chill :categoryChill="$cateogry->children" :level="$level . '--'" />
    @endif
@endforeach
