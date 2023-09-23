@props(['column' => 4, 'control' => true])
<div class="product-group" {{ $attributes }}>
    @foreach ($productList as $item)
        <div class="{{ 'col-sm-' . $column }}">
            <x-product.card control="{{ $control }}" :data="$item" />
        </div>
    @endforeach
</div>
