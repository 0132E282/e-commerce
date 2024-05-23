<?php

namespace App\View\Components\table;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class tableMenus extends Component
{
    /**
     * Create a new component instance.
     */
    protected $menus;
    public function __construct($menus)
    {
        $this->menus = $menus;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table.table-menus', ['menus' => $this->menus]);
    }
}
