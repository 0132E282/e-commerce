<?php

namespace App\Http\Controllers;

use App\Http\Requests\validateOrder;
use App\Models\Category;
use App\Models\Customers;
use App\Models\Orders;
use App\Models\Products;
use App\Models\ProductVariants;
use App\Repository\RepositoryMain\ProductsRepository;
use Exception;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session as FacadesSession;
use PharIo\Manifest\Extension;
use PhpOffice\PhpSpreadsheet\Calculation\TextData\Extract;

class ShopController extends Controller
{
    protected $modelProduct;
    protected $modelOrders;
    protected $modelCustomers;
    protected $modelCategory;
    protected $idCategory = [];
    protected $productsRepository;
    function __construct()
    {
        $this->modelProduct = new Products();
        $this->modelOrders = new Orders();
        $this->modelCategory = new Category();
        $this->modelCustomers = new Customers();
        $this->productsRepository = new ProductsRepository();
        Paginator::useBootstrapFive();
    }
    function index($slug = null)
    {
        $productList = $this->modelProduct;
        $productList =  $productList->latest()->paginate(12);
        return view('pages/shop/index', ['productList' => $productList]);
    }
    function detail($slug = null, $id = null)
    {
        try {
            $product = $this->productsRepository->details($id);
            return view('pages/shop/detail', ['detailProduct' => $product]);
        } catch (\Exception $e) {
        }
    }
    function addToCart($slug = null, $id = null, Request $req)
    {
        try {
            $productVariants = $this->productsRepository->findVariants($id, $req)[0];
            if ($productVariants->quantity < $req->quantity) throw new Exception('số lượng kho hàng không đủ');
            $cart = session()->get('cart_product', []);
            $cart[$productVariants->id] = [
                'name_product' => $productVariants->name,
                'feature_image' => $productVariants->product->feature_image,
                'price_product' => $productVariants->price,
                'slug_product' => $productVariants->product->slug,
                'id_products' => $productVariants->product->id,
                'quantity' => $req->quantity,
                'color' => $productVariants->color,
                'size' => $productVariants->size
            ];
            session()->put('cart_product', $cart);
            return  response()->json([
                'message' => ' success',
                'type' => 'success',
                'data' => [
                    'cart' => $cart,
                    'total' => count($cart)
                ]
            ], 200);
        } catch (\Exception $e) {
            return  response()->json(['message' => $e->getMessage(), 'type' => 'error']);
        }
    }
    function cart()
    {
        try {
            $products = session()->get('cart_product', []);
            return view('pages/shop/cart', ['products' => $products]);
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
            return response()->json(['message' => 'thành công', 'data' => [
                'cart' => $product,
                'total' => count($product)
            ], 'type' => 'success']);
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
    function findVariants($id, Request $req)
    {
        return response()->json($this->productsRepository->findVariants($id, $req));
    }
}
