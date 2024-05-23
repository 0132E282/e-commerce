<?php

namespace App\View\Components\Table;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TableMenuItems extends Component
{
    /**
     * Create a new component instance.
     */
    protected $menuItems;
    public function __construct($menuItems)
    {
        $this->menuItems = $menuItems;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table.table-menu-items', ['menuItems' => $this->menuItems]);
    }
}
