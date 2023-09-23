@props(['class' => null])

<ul role="menu" @class(['sub-menu', $class]) {{ $attributes }}>
    @foreach ($dataMenus as $menus)
        @if (!$menus->menusChildren->count() > 0)
            <li><a href="{{ $menus->route }}">{{ $menus->name_menus }}</a></li>
        @else
            <li class="dropdown"><a href="{{ $menus->route }}">{{ $menus->name_menus }}</a>
                <x-menus.menus-children class="children_menu" :data="$menus->menusChildren" />
            </li>
        @endif
    @endforeach
</ul>
