<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Category;
use App\Models\Customers;
use App\Models\Orders;
use App\Models\Products;
use App\Repository\RepositoryMain\CategoryRepository;
use App\Repository\RepositoryMain\ProductsRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class ShopController extends Controller
{
    protected $modelOrders;
    protected $modelCustomers;
    protected $modelCategory;
    protected $idCategory = [];
    protected $productsRepository;
    protected $categoryRepository;
    function __construct()
    {
        $this->modelOrders = new Orders();
        $this->modelCategory = new Category();
        $this->modelCustomers = new Customers();
        $this->categoryRepository = new CategoryRepository();
        $this->productsRepository = new ProductsRepository();
        Paginator::useBootstrapFive();
    }
    function index(Request $req, Category $category, Brands $brands)
    {
        $products = $this->productsRepository->shop(25, ['search' => $req->search, 'filter' => ['category' => $category->id, 'brand' => $brands->id]]);
        return view('pages/shop/index', ['productList' => $products]);
    }
    function brand(Category $category)
    {
        $products = $this->productsRepository->shop(25, ['filter' => ['category' => $category->id]]);
        return view('pages/shop/index', ['productList' => $products]);
    }
    function detail(Category $category, products $products)
    {
        try {
            $product = $this->productsRepository->details($products->id);
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
            return  response()->json(['message' => $e->getMessage(), 'type' => 'error'], 409);
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
