<?php

namespace App\Http\Controllers;

use App\Models\OrderItems;
use App\Models\Orders;
use App\Repository\RepositoryMain\OrdersRepository;
use App\Repository\RepositoryMain\ProductsRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class AdminMessageController extends Controller
{
    protected $modalOrders;
    protected $modalOrdersItem;
    protected $orderRepository;
    protected $productRepository;
    function __construct()
    {
        $this->modalOrders = new Orders();
        $this->modalOrdersItem = new OrderItems();
        $this->orderRepository = new OrdersRepository();
        $this->productRepository = new ProductsRepository();
        Paginator::useBootstrapFive();
    }
    function index(Request $req)
    {
        $statistical = $this->orderRepository->statistical($req->date);
        $topProductBill = $this->productRepository->shopSlider('order', 10);
        return view('pages/admin/admin-page', ['statistical' => $statistical, 'topProductBill' => $topProductBill]);
    }
}
