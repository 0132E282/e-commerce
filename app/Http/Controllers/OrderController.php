<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Orders;
use App\Payments\Payment;
use App\Repository\RepositoryMain\OrdersRepository;
use App\Repository\RepositoryMain\ProductsRepository;
use App\Repository\RepositoryMain\ProductsValidationRepository;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    protected $modelOrder;
    protected $payments;
    protected $productsRepository;
    protected $variationsModal;
    protected $ordersRepository;
    function __construct()
    {
        Paginator::useBootstrapFive();
        $this->modelOrder = new Orders();
        $this->payments = new Payment();
        $this->productsRepository = new ProductsRepository();
        $this->variationsModal = new ProductsValidationRepository();
        $this->ordersRepository = new OrdersRepository();
    }

    function index(OrderRequest $req, $status = null)
    {
        $orders  = $this->ordersRepository->all([
            'status' => $status,
            ...$req->input()
        ])->paginate(25);
        return view('pages.order.manager-all', ['orders' => $orders]);
    }
    function detailBill($id)
    {
        $bill = $this->modelOrder->find($id);
        $orderNext = $this->modelOrder->where('id', '>', $bill->id)->orderBy('id', 'ASC')->first('id');
        $orderBefore  = $this->modelOrder->where('id', '<', $bill->id)->orderBy('id', 'desc')->first('id');
        return view('pages.order.details', ['bill' => $bill, 'orderNext' =>  $orderNext, 'orderBefore' =>  $orderBefore]);
    }
    function updateCustomer($id = null, Request $req)
    {
        try {
            $order = $this->modelOrder->find($id);
            $order->update([
                'fullname' =>  $req->fullname,
                'address' => json_encode($req->address),
                'phone' =>  $req->phone,
                'email' =>  $req->email,
                'note' =>  trim($req->note)
            ]);
            return back()->with('message', ['content' => 'cập nhập thành công', 'type' => 'success']);
        } catch (\Exception $e) {
            return back()->with('message', ['content' =>  $e->getMessage(), 'type' => 'error']);
        }
    }
    function updateOrderItem($id, Request $request)
    {
        try {
            $order =  $this->modelOrder->find($id);
            if ($order->status != null) throw new Exception(($order->status == 1 ? 'đơn hàng đã xác nhận' : 'đơn hàng đã hủy') . ' bạn không thể cập nhập');
            $orderNotUpdateCount = 0;
            foreach ($request->order as $key => $orderItem) {
                if ($orderItem['quantity'] < 1) {
                    $orderNotUpdateCount += 1;
                    continue;
                }
                $order->order_items()->where('id', '=', $key)->update($orderItem);
            }
            if ($orderNotUpdateCount >= 1)  throw new Exception('có ' . $orderNotUpdateCount . ' đơn hàng không được cập nhập');
            return back()->with('message', ['content' => 'cập nhập thành công', 'type' => 'success']);
        } catch (\Exception $e) {
            return back()->with('message', ['content' => $e->getMessage(), 'type' => 'error']);
        }
    }
    function formCU($id = null, Request $request)
    {
        $order = $this->modelOrder->find($id);
        return view('pages.order.form-customer', ['order' => $order]);
    }
    function createOrderClient(Request $req)
    {
        try {
            $productsCart = collect(session('cart_product'))->transform(function ($product, $key) {
                return [
                    'variation_id' => $key,
                    'quantity' => $product['quantity'],
                    'price' => $product['price_product']
                ];
            });
            if ($productsCart->count() <= 0) throw new Exception('cửa hàng chưa có sản phẩm');
            $totalPice = $productsCart->reduce(fn ($total, $product) => $total + $product['price'] * intval($product['quantity']));
            $data = [
                'fullname' => $req->fullname,
                'address' => json_encode($req->address),
                'email' => $req->email,
                'phone' => $req->phone,
                'note' => $req->note,
                'payment' => $req->payment,
                'user_id' => Auth::id() ?? null,
                'trading_code' => rand(0, 999999),
            ];
            $order = $this->modelOrder->create($data);
            $order['order_items'] = $order->order_items()->createMany($productsCart);

            if (!empty($order['order_items'])) {
                foreach ($order['order_items'] as $orderItem) {
                    $orderItem->variation()->update(['quantity' => $orderItem->quantity]);
                }
                if ($req->payment != null) {
                    $config = ['redirect_url' => route('client.order.rel-checkout', $order->id)];
                    $payment = $this->payments->initialize($req->payment, $config);
                    $relPayment =  $this->payments->checkout($payment, $totalPice, $order->trading_code, 'thanh toán đơn hàng ');
                }
                session()->forget('cart_product');
            }
            return response()->json(['message' => 'success', 'status_code' => 200, 'data' => $order, 'payment' =>  $relPayment ?? null], 200);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
    function exportExcel()
    {
    }
    function updateStatus($id, $status)
    {
        try {
            $this->modelOrder->find($id)->update(['status' => $status]);
            return back()->with('message', ['content' => 'cập nhập thành công', 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('message',  ['content' => $e->getMessage(), 'type' => 'error']);
        }
    }
    function trash()
    {
        try {
            $orders = $this->ordersRepository->trash()->paginate(25);
            return view('pages.order.trash', ['orders' => $orders]);
        } catch (Exception $e) {
            return back()->with('message',  ['content' => $e->getMessage(), 'type' => 'error']);
        }
    }
    function restore($id)
    {
        try {
            $this->ordersRepository->restore($id);
            return back()->with('message', ['content' => 'đã khôi phục thành công', 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('message', ['content' =>  $e->getMessage(), 'type' => 'error']);
        }
    }
    function destroy($id)
    {
        try {
            $order = $this->ordersRepository->destroy($id);
            return back()->with('message', ['content' => 'xóa thành công', 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('message', ['content' =>  $e->getMessage(), 'type' => 'error']);
        }
    }
    function relCheckout($id, Request $request)
    {
        try {
            $order = $this->modelOrder->find($id);
            throw_if(isset($request->vnp_ResponseCode) && $request->vnp_ResponseCode != 00 ||  isset($request->resultCode) != null && $request->resultCode != 0, 'Dao dịch thất bại');
            if (isset($request->responseTime) || isset($request->vnp_PayDate)) {
                $data = Carbon::createFromTimestamp(($request->responseTime ?? $request->vnp_PayDate) / 1000);
                $order->update(['paid_at' => $data]);
            }
            return view('pages.shop.rel-checkout', ['order' => $order]);
        } catch (\Exception $e) {
            $order = $this->modelOrder->find($id);
            $order->update(['status' => 0]);
            return view('pages.shop.rel-checkout', ['message' => $e->getMessage()]);
        }
    }
    function deleteOrderItem($id, $id_order_item)
    {
        try {
            $orderItem = $this->modelOrder->find($id)->order_items();
            if ($this->modelOrder->find($id)->status != null) throw new Exception(($this->modelOrder->find($id)->status == 1 ? 'đơn hàng đã xác nhận' : 'đơn hàng đã hủy') . ' bạn không thể xóa');;
            if ($orderItem->count() <= 1) throw new Exception('đơn hàng phải có ích nhất 1 sản phẩm');
            $orderItem->where('id', $id_order_item)->delete();
            return back()->with('message', ['content' => 'xóa thành công', 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('message',  ['content' => $e->getMessage(), 'type' => 'error']);
        }
    }
    function addProductForm()
    {
        $products = $this->productsRepository->all(25);
        return view('pages.order.add-product', ['products' => $products]);
    }
    function addProduct($id, Request $request)
    {
        try {
            $order = Orders::find($id);
            if ($order->count() > 0 && $order->status != null) throw new Exception('đơn hàng đã được xác nhận bạn không thể thêm');
            foreach ($request->orders as $key => $orderData) {
                $productAttr = $this->variationsModal->details($key);
                $data = [
                    'quantity' => $orderData['quantity'],
                    'variation_id' => $productAttr->id,
                    'price' => $productAttr->price,
                ];
                $order->order_items()->updateOrCreate(
                    ['variation_id' => $data['variation_id']],
                    $data
                );
            }
            return back()->with('message', ['content' =>  'đã thêm thành công', 'type' => 'success']);
        } catch (\Exception $e) {
            return back()->with('message', ['content' =>  $e->getMessage(), 'type' => 'error']);
        }
    }
    function delete($id)
    {
        try {
            $this->ordersRepository->delete($id);
            return back()->with('message', ['content' =>  'Đơn hàng của bạn đã ở trong thung rác', 'type' => 'success']);
        } catch (\Exception $e) {
            return back()->with('message', ['content' =>   $e->getMessage(), 'type' => 'error']);
        }
    }
}
