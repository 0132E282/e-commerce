<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class TableCategory extends Component
{
    public $dataCategoryList = [];
    public $routeName = '';
    public function __construct($data)
    {
        $this->dataCategoryList = $data;
        $this->routeName = Route::currentRouteName();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components/table/table-category');
    }
}
