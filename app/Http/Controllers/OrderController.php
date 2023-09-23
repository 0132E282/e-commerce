<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\Orders;
use Illuminate\Pagination\Paginator;

class OrderController extends Controller
{
    protected $modelCustomers;
    protected $modelOrder;
    function __construct()
    {
        $this->modelOrder = new Orders();
        $this->modelCustomers = new Customers();
        Paginator::useBootstrapFive();
    }

    function index()
    {
        $billList = $this->modelOrder->with(['customers'])->paginate(25);
        return view('pages.order.index', ['billList' => $billList]);
    }
    function detailBill($id)
    {
        $billList = $this->modelOrder->with(['customers', 'orderItems.products'])->find($id);
        return response()->json($billList);
    }
}
