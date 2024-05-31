<div class="container">
    <div class="row">
        <div class="col-sm-9">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="mainmenu pull-left">
                <ul class="nav navbar-nav collapse navbar-collapse">
                    @foreach ($menusList as $item)
                        @if ($item->children->count() > 0)
                            <li class="dropdown"><a href="{{ $item->link }}">{{ $item->title }}<i class="fa fa-angle-down"></i></a>
                                <x-menus.menus-children :menuChildren="$item->children" />
                            </li>
                        @else
                            <li>
                                <a href="{{ $item->link ?? '' }}" class="{{ url()->current() == $item->link ? 'active' : '' }}">{{ $item->title }}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-sm-3">
            <form action="{{ route('client.shop.view') }}">
                <div class="search_box pull-right" style="display: flex; width: 100%;">
                    <input type="text" style="flex: 1" value="{{ request()->input('search') ?? '' }}" name="search" placeholder="tên ,nhản hiệu, danh mục sản phẩm " />
                </div>
            </form>
        </div>
    </div>
</div>
