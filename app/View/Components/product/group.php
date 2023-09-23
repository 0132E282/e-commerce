<?php

namespace App\View\Components\product;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Group extends Component
{
    protected $productList;
    public function __construct($data)
    {
        $this->productList = $data;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.product.group', ['productList' => $this->productList]);
    }
}
