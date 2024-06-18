<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\OrderItems;
use App\Models\Orders;
use App\Models\Products;
use App\Repository\RepositoryMain\CategoryRepository;
use App\Repository\RepositoryMain\OrdersRepository;
use App\Repository\RepositoryMain\ProductsRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class AdminMessageController extends Controller
{
    protected $modalOrders;
    protected $modalOrdersItem;
    protected $orderRepository;
    protected $productRepository;
    protected $categoryRepository;
    function __construct()
    {
        $this->modalOrders = new Orders();
        $this->modalOrdersItem = new OrderItems();
        $this->orderRepository = new OrdersRepository();
        $this->productRepository = new ProductsRepository();
        $this->categoryRepository = new CategoryRepository();
        Paginator::useBootstrapFive();
    }
    function index(Request $req)
    {
        $statistical = $this->orderRepository->statistical($req->date);
        $TopProducts =  $this->productRepository->topProducts();
        $topCategory =  $this->categoryRepository->topByOrder();
        return view('pages/admin/admin-page', ['statistical' => $statistical, 'TopProducts' => $TopProducts, 'topCategory' => $topCategory]);
    }
}
