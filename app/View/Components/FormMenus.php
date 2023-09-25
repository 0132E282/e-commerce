<?php

namespace App\View\Components;

use App\Components\Recusive;
use App\Models\Menus;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class FormMenus extends Component
{
    public $recusive;
    public $detailsMenus;
    protected $modelMenus;
    public function __construct($detailsMenus)
    {
        $this->detailsMenus = $detailsMenus;
        $this->modelMenus = new Menus();
    }


    public function render(): View|Closure|string
    {
        $this->recusive = new Recusive($this->modelMenus->all());

        $dataCategory =  $this->recusive->filterMenus(optional($this->detailsMenus)->parent_id);
        $routes = Route::getRoutes()->getRoutesByMethod()['GET'];
        $routes = array_filter($routes, function ($value) {
            return !preg_match('/^admin/', $value->uri) && in_array('web', $value->middleware())  && $value->uri() !== 'sanctum/csrf-cookie' && !str_contains($value->uri(), '{');
        });
        return view('components/form/form-menus', ['dataMenuSelect' => $dataCategory, 'routes' => $routes]);
    }
}
