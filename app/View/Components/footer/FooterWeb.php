<?php

namespace App\View\Components\footer;

use App\Models\Menus;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FooterWeb extends Component
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
        $menus =  $this->modelMenus->where('location', '=', 'bottom')->first();
        if (!empty($menus)) {
            $menusList = $menus->menu_items()->orderBy('location', "ASC")->whereNull('parent_id')->get();
        }
        return view('components.footer.footer-web', ['menusList' => $menusList ?? []]);
    }
}
