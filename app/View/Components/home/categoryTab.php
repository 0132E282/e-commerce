<?php

namespace App\View\Components\home;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class categoryTab extends Component
{
    /**
     * Create a new component instance.
     */
    protected $modelCategory;
    public function __construct()
    {
        $this->modelCategory =  new Category();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $categoryList = $this->modelCategory->latest('views_count', 'desc')->take(8)->get();

        return view('components.home.category-tab', ['categoryList' => $categoryList]);
    }
}
