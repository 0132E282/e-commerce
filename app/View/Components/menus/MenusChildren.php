<?php

namespace App\View\Components\menus;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MenusChildren extends Component
{
    protected $dataMenus;
    public function __construct($data)
    {
        $this->dataMenus = $data;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.menus.menus-children', ['dataMenus' => $this->dataMenus]);
    }
}
