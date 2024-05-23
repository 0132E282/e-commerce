@props(['level' => '|__', 'paddingRow' => 12, 'controls' => null])
@foreach ($menuItemChildren as $menuItem)
    <x-menus.row-menu-item :menuItem="$menuItem" :level="$level ?? ''" :paddingRow="$paddingRow" :controls="$controls" />
    @if ($menuItem->children->count() > 0)
        @php
            $controls = '.' . $menuItem->id . '_controls';
        @endphp
        <x-menus.row-menu-item-children :menuItemChildren="$menuItem->children" :level="$level" :paddingRow="$paddingRow + 25" :controls="$controls" />
    @endif
@endforeach
