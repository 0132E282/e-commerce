<?php

namespace App\View\Components\Home;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CategoryTab extends Component
{
    /**
     * Create a new component instance.
     */
    protected $categoryList = [];
    public function __construct($categoryList = [])
    {
        $this->categoryList = $categoryList;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.home.category-tab', ['categoryList' => $this->categoryList]);
    }
}
