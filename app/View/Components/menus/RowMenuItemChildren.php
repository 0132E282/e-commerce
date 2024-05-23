<?php

namespace App\View\Components\Menus;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RowMenuItemChildren extends Component
{
    /**
     * Create a new component instance.
     */
    protected $menuItemChildren;
    public function __construct($menuItemChildren)
    {
        $this->menuItemChildren = $menuItemChildren;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.menus.row-menu-item-children', ['menuItemChildren' => $this->menuItemChildren]);
    }
}
