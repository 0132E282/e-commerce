@props(['class' => null])


<ul role="menu" @class(['sub-menu', $class]) {{ $attributes }}>
    @foreach ($menuChildren as $menu)
        @if ($menu->children->count() > 0)
            <li class="dropdown"><a href="{{ $menu->link }}">{{ $menu->title }}</a>
                <x-menus.menus-children class="children" :menuChildren="$menu->children" />
            </li>
        @else
            <li><a href="{{ $menu->link }}" class="{{ url()->current() == $menu->link ? 'active' : '' }}">{{ $menu->title }}</a></li>
        @endif
    @endforeach
</ul>
