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
    protected $dataOrders;
    public function __construct($data)
    {
        $this->dataOrders = $data;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $statusList = config('status.status');
        return view('components.admin.latest-orders', ['dataOrders' =>  $this->dataOrders, 'statusList' => $statusList]);
    }
}
