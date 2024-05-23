@props(['class'])
<div class="wrapper">
    <h2>Danh mục sản phẩm</h2>
    <div {{ $attributes }} @class(['panel-group', $class])id="accordian">
        @foreach ($categoryList as $value)
            @php
                $checkChildrenCount = !empty($value['children']) && count($value['children']) > 0;
                $router = route('client.shop.category', ['slug' => $value->slug]);
            @endphp
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        @if ($checkChildrenCount)
                            <a data-toggle="collapse" data-parent="#accordian" href="{{ $checkChildrenCount ? '#sportswear_' . $value->id : '' }}">
                                <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                <a href=" {{ $router }}">{{ $value->name }}</a>
                            </a>
                        @else
                            <a href=" {{ $router }}">{{ $value->name }}</a>
                        @endif
                    </h4>
                </div>
                <div id="{{ 'sportswear_' . $value->id }}" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul>
                            @if ($checkChildrenCount)
                                @foreach ($value['children'] as $value)
                                    @php
                                        $router = route('client.shop.category', ['slug' => $value->slug]);
                                    @endphp
                                    <li><a href=" {{ $router }}"> {{ $value->name }} </a></li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
