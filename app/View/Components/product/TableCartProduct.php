<?php

namespace App\View\Components\product;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TableCartProduct extends Component
{
    /**
     * Create a new component instance.
     */
    protected $dataProducts;
    public function __construct($data)
    {
        $this->dataProducts = $data;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.product.table-cart-product', ['dataProducts' => $this->dataProducts]);
    }
}
