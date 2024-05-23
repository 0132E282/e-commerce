<?php

namespace App\View\Components\Form;

use App\Components\Recusive;
use App\Models\Category;
use App\Models\Menus;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class FormMenus extends Component
{
    public $recusive;
    public $menu;
    protected $modelMenus;
    public function __construct($menu = null)
    {
        $this->menu = $menu;
        $this->modelMenus = new Menus();
    }


    public function render(): View|Closure|string
    {
        return view('components/form/form-menus');
    }
}
