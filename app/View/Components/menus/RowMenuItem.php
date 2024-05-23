<?php

namespace App\View\Components\Menus;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RowMenuItem extends Component
{
    /**
     * Create a new component instance.
     */
    protected $menuItem;
    public function __construct($menuItem = null)
    {
        $this->menuItem = $menuItem;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.menus.row-menu-item', ['menuItem' => $this->menuItem]);
    }
}
