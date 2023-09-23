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
                        @if (!$item->menusChildren->count() > 0)
                            <li>
                                <a href="{{ $item->route ?? '' }}" class="active">{{ $item->name_menus }}</a>
                            </li>
                        @else
                            <li class="dropdown"><a href="{{ $item->route }}">{{ $item->name_menus }}<i class="fa fa-angle-down"></i></a>
                                <x-menus.menus-children :data="$item->menusChildren" />
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="search_box pull-right">
                <input type="text" placeholder="Search" />
            </div>
        </div>
    </div>
</div>
