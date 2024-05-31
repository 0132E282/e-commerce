@props(['class'])
<div class="wrapper">
    <h2>Danh mục sản phẩm</h2>
    <div {{ $attributes }} @class(['panel-group', $class])id="accordian">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a href=" {{ route('client.shop.view') }}">TẤT CẢ</a>
            </h4>
        </div>
        @foreach ($categoryList as $category)
            @php
                $checkChildrenCount = !empty($category['children']) && count($category['children']) > 0;
                $router = route('client.shop.category', $category);
            @endphp
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        @if ($checkChildrenCount)
                            <a data-toggle="collapse" data-parent="#accordian" href="{{ $checkChildrenCount ? '#sportswear_' . $category->id : '' }}">
                                <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                <a href=" {{ $router }}">{{ $category->name }}</a>
                            </a>
                        @else
                            <a href=" {{ $router }}">{{ $category->name }}</a>
                        @endif
                    </h4>
                </div>
                <div id="{{ 'sportswear_' . $category->id }}" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul>
                            @if ($checkChildrenCount)
                                @foreach ($category['children'] as $category)
                                    @php
                                        $router = route('client.shop.category', $category);
                                    @endphp
                                    <li><a href=" {{ $router }}"> {{ $category->name }} </a></li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
