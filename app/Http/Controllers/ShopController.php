<?php

namespace App\Http\Controllers;

use App\Http\Requests\validateOrder;
use App\Models\Customers;
use App\Models\Orders;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    protected $modelProduct;
    protected $modelOrders;
    protected $modelCustomers;

    function __construct()
    {
        $this->modelProduct = new Products();
        $this->modelOrders = new Orders();
        $this->modelCustomers = new Customers();
        Paginator::useBootstrapFive();
    }
    function index($slug = null, $id = null)
    {
        $productList = $this->modelProduct;
        if ($id) {
            $productList = $productList->where('id_category', '=', $id);
        }
        $productList =  $productList->latest()->paginate(12);
        return view('pages/shop/index', ['productList' => $productList]);
    }
    function detail($slug = null, $id = null)
    {
        try {
            $product = $this->modelProduct->where('id_product', '=', $id)->where('slug_product', '=', $slug)->first();
            $product->update(['views_count' => $product->views_count++]);
            $recommendedProduct = $this->modelProduct->latest('views_count')->where('id_category', '=', $product->id_category)->where('id_product', '!=', $id)->where('slug_product', '!=', $slug)->get();
            $product['imagesList'] = $product->productImages;
            return view('pages/shop/detail', ['detailProduct' => $product, 'recommendedProduct' => $recommendedProduct]);
        } catch (\Exception $e) {
        }
    }
    function addToCart($slug = null, $id = null, Request $request)
    {
        try {
            $product = $this->modelProduct->where('slug_product', '=', $slug)->where('id_product', '=', $id)->first();
            $cart = session()->get('cart_product', []);
            $cart[$product->id_product] = [
                'name_product' => $product->name_product,
                'feature_image' => $product->feature_image,
                'price_product' => $product->price_product,
                'slug_product' => $product->slug_product,
                'id' => $product->id_product,
                'quantity' => $request->quantity
            ];
            session()->put('cart_product', $cart);
            return  back()->with('message', ['content' => 'product added to cart successfully', 'type' => 'success']);
        } catch (\Exception $e) {
            abort(500);
        }
    }
    function cart()
    {
        try {
            $products = session()->get('cart_product', []);
            $totalPrice = array_reduce($products, function ($price, $product) {
                return $price + $product['price_product'];
            });

            return view('pages/shop/cart', ['products' => $products, 'totalPrice' => $totalPrice]);
        } catch (\Exception $e) {
            abort(500);
        }
    }
    function deleteProductCart($slug = null, $id = null)
    {
        try {
            $product = session()->get('cart_product');
            unset($product[$id]);
            session()->put('cart_product', $product);

            return back()->with('message', 'product deleted successfully');
        } catch (\Exception $e) {
            abort(500);
        }
    }
    function checkout()
    {
        try {
            return view('pages/shop/check-out');
        } catch (\Exception $e) {
            abort(500);
        }
    }
    function createOrder(validateOrder $req)
    {
        try {
            $userId = Auth::id();
            $products = session()->get('cart_product');
            $customers = $this->modelCustomers->create(
                [
                    'name' => $req->name,
                    'address' => $req->address,
                    'email' => $req->email,
                    'phone_number' => $req->phone_number,
                ]
            );
            $order = $customers->orders()->create([
                'user_id' => $userId,
                'status' => 'order',
                'note' => $req->message,
            ]);
            foreach ($products as $product) {
                $order->orderItems()->create([
                    'product_id' => $product['id'],
                    'quantity' => $product['quantity'],
                ]);
            }
            return back()->with('message', ['content' => 'order successfully created', 'type' => 'success']);
        } catch (\Exception $e) {
            abort(500);
        }
    }
}
