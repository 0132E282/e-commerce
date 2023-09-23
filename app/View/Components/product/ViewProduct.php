<?php

namespace App\View\Components\product;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ViewProduct extends Component
{
    /**
     * Create a new component instance.
     */
    protected $detailProduct;
    public function __construct($data)
    {
        $this->detailProduct = $data;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.product.view-product', ['detailProduct' => $this->detailProduct]);
    }
}
