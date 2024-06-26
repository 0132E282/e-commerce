<?php

namespace App\View\Components\admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use PSpell\Config;

class LatestOrders extends Component
{
    /**
     * Create a new component instance.
     */
    protected $products;
    public function __construct($data)
    {
        $this->products = $data;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.latest-orders', ['products' =>  $this->products]);
    }
}
