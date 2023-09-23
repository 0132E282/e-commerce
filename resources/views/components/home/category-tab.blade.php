<div>
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            @foreach ($categoryList as $key => $category)
                <li class="{{ $key == 0 ? 'active' : '' }}"><a href="{{ '#' . $category->slug_category }}" data-toggle="tab">{{ $category->name_category }}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="tab-content">
        @foreach ($categoryList as $key => $category)
            <div class="tab-pane fade {{ $key == 0 ? 'active' : '' }} in" id="{{ $category->slug_category }}">
                <x-product.group colmun="3" control="false" :data="$category
                    ->product()
                    ->latest('views_count')
                    ->take(3)
                    ->get()" />
            </div>
        @endforeach
    </div>
</div>
