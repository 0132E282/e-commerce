<?php

namespace App\View\Components;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CategoryProducts extends Component
{
    /**
     * Create a new component instance.
     */
    protected $modelCategory;
    public function __construct()
    {
        $this->modelCategory = new Category();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $categoryList =  $this->modelCategory->where('parent_id', 0)->get();
        foreach ($categoryList as $key => $category) {
            $categoryList[$key]['children'] = $category->categoryParent()->get();
        }
        return view('components.category-products', ['dataCategory' => $categoryList]);
    }
}
