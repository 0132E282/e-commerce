<?php

namespace App\View\Components\product;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductInformation extends Component
{
    /**
     * Create a new component instance.
     */
    protected $detailProductInfo;
    public function __construct($data)
    {
        $this->detailProductInfo = $data;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.product.product-information', ['detailProductInfo' => $this->detailProductInfo]);
    }
}
