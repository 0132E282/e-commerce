@props(['class'])
<div class="wrapper">
    <h2>Category</h2>
    <div {{ $attributes }} @class(['panel-group', $class])id="accordian">
        @foreach ($dataCategory as $value)
            @php
                $checkChildrenCount = !empty($value['children']) && count($value['children']) > 0;
                $router = route('category-shop', ['slug' => $value->slug_category]);
            @endphp
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        @if ($checkChildrenCount)
                            <a data-toggle="collapse" data-parent="#accordian" href="{{ $checkChildrenCount ? '#sportswear_' . $value->id_category : '' }}">
                                <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                <a href=" {{ $router }}">{{ $value->name_category }}</a>
                            </a>
                        @else
                            <a href=" {{ $router }}">{{ $value->name_category }}</a>
                        @endif
                    </h4>
                </div>
                <div id="{{ 'sportswear_' . $value->id_category }}" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul>
                            @if ($checkChildrenCount)
                                @foreach ($value['children'] as $value)
                                    @php
                                        $router = route('category-shop', ['slug' => $value->slug_category]);
                                    @endphp
                                    <li><a href=" {{ $router }}"> {{ $value->name_category }} </a></li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

</div>
