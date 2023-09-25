<?php

namespace App\View\Components\admin;

use App\Models\Orders;
use App\Models\Products;
use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SmallBoxes extends Component
{
    protected $modalOrder;
    protected $modalProduct;
    protected $modalUsers;

    function __construct()
    {
        $this->modalOrder = new Orders();
        $this->modalProduct = new Products();
        $this->modalUsers = new User();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $bill = $this->modalOrder->all();
        $product = $this->modalProduct->all();
        $user = $this->modalUsers->all();
        $quantityList = [
            [
                'title' => 'đơn hàng',
                'route' => route('orders'),
                'fill' => 'bg-info',
                'quantity' => count($bill),
                'icon' => 'ion ion-bag'
            ],
            [
                'title' => 'sản phẩm còn có',
                'route' => route('product-page'),
                'fill' => 'bg-success',
                'quantity' => $product->sum('count_warehouse'),
                'icon' => 'ion ion-stats-bars'
            ],
            [
                'title' => 'số lượng sản phẩm đã bán',
                'route' => $product->sum('count_warehouse'),
                'fill' => 'bg-success',
                'quantity' => count($product),
                'icon' => 'ion ion-stats-bars'
            ],
            [
                'title' => 'tài khoản người dùng',
                'route' => route('user'),
                'fill' => 'bg-warning',
                'quantity' => count($user),
                'icon' => 'ion ion-person-add'
            ]
        ];
        return view('components.admin.small-boxes', ['quantityList' => $quantityList]);
    }
}
