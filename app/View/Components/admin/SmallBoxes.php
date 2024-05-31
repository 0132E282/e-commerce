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
                'title' => 'tổng đơn đơn hàng',
                'route' => route('admin.order.index'),
                'fill' => 'bg-info',
                'quantity' => $bill->count(),
                'icon' => 'ion ion-bag'
            ],
            [
                'title' => 'Số lượng sản phẩm',
                'route' => route('admin.products.index'),
                'fill' => 'bg-success',
                'quantity' => $product->count(),
                'icon' => 'ion ion-stats-bars'
            ],
            [
                'title' => 'Sẩn phẩm hêt hàng',
                'route' => route('admin.products.index'),
                'fill' => 'bg-success',
                'quantity' => number_format($this->modalProduct->whereHas('variations', fn ($query) => $query->where('quantity', '<=', 0))->count()),
                'icon' => 'ion ion-stats-bars'
            ],
            [
                'title' => 'tài khoản người dùng',
                'route' => route('admin.users.index'),
                'fill' => 'bg-warning',
                'quantity' => count($user),
                'icon' => 'ion ion-person-add'
            ]
        ];
        return view('components.admin.small-boxes', ['quantityList' => $quantityList]);
    }
}
