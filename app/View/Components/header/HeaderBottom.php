<?php

namespace App\View\Components\header;

use App\Models\Menus;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HeaderBottom extends Component
{
    /**
     * Create a new component instance.
     */
    protected $modelMenus;
    public function __construct()
    {
        $this->modelMenus = new Menus();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $menusList =  $this->modelMenus->where('location', '=', 'top')->first()->menu_items()->orderBy('location', "ASC")->whereNull('parent_id')->get();
        return view('components.header.header-bottom', ['menusList' => $menusList]);
    }
}
