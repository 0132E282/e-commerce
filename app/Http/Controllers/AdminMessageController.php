<?php

namespace App\Http\Controllers;

use App\Models\OrderItems;
use App\Models\Orders;
use App\Models\Products;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class AdminMessageController extends Controller
{
    protected $modalOrders;
    protected $modalOrdersItem;
    function __construct()
    {
        $this->modalOrders = new Orders();
        $this->modalOrdersItem = new OrderItems();
        Paginator::useBootstrapFive();
    }
    function index()
    {
        $currentDate = Carbon::now();
        $billList = $this->modalOrders->with(['orderItems.products'])->where('created_at', '>=', $currentDate->subDays(7));
        $historyBill = $billList->latest()->paginate(5);
        $sales = $billList->where('status', 'Shipped')->get();
        return view('pages/admin/admin-page', ['historyBill' => $historyBill, 'sales' => $sales]);
    }
}
