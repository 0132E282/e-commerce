<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use App\Http\Requests\ProductsRequest;
use App\Models\Category;
use App\Models\Products;
use App\Repository\RepositoryMain\CategoryRepository;
use App\Repository\RepositoryMain\ProductsRepository;
use App\Repository\RepositoryMain\ProductsValidationRepository;
use App\Repository\RepositoryMain\TagsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;
use Maatwebsite\Excel\Facades\Excel;
use Exception;

class ProductsController extends Controller
{
    protected $modelProducts;
    protected $modelCategory;
    protected $productRepository;
    protected $productsValidationRepository;
    protected $tagsRepository;
    protected $categoryRepository;
    function __construct()
    {
        $this->productRepository = new ProductsRepository();
        $this->productsValidationRepository = new ProductsValidationRepository();
        $this->categoryRepository = new CategoryRepository();

        $this->tagsRepository = new TagsRepository();
        $this->modelProducts = new Products();
        $this->modelCategory = new Category();
        Paginator::useBootstrapFive();
    }

    function index(ProductsRequest $req, $status = null)
    {
        $status =  $status === 'stop-working' ? 0 : ($status === 'work' ? 1 : null);
        $option = ['filter' => $req->filter, 'status' => $status, 'search' => $req->search, ...$req->input()];
        $products = $this->productRepository->all($option);
        $categoryList =  $this->categoryRepository->has_products();
        return view('pages.products.manager-all', ['products' => $products, 'categoryList' => $categoryList]);
    }
    function soldOut(ProductsRequest $req,)
    {
        $option = ['filter' => $req->filter,  'search' => $req->search, ...$req->input()];
        $products = $this->productRepository->all($option, function ($query) {
            $query->whereHas('variations', function ($query) {
                $query->whereNull('quantity')->orWhere('quantity', 0);
            });
        });
        $categoryList =  $this->categoryRepository->has_products();
        return view('pages.products.manager-all', ['products' => $products, 'categoryList' => $categoryList]);
    }
    function details($id)
    {
        $product = $this->productRepository->details($id);
        return view('pages.products.details', ['product' => $product]);
    }
    function status($status)
    {
        $products = $this->productRepository->all(['status' => $status]);
        $categoryList =  $this->categoryRepository->has_products();
        return view('pages.products.manager-all', ['products' => $products, 'categoryList' => $categoryList]);
    }
    function trash(Request $req)
    {
        $option = [
            'order' => $req->order,
            'by' => $req->by,
            'quantity' => $req->quantity,
            'price' => $req->price,
            'search' => $req->search,
            'category' => $req->category,
            'created' => $req->created,
            'brand' => $req->brand
        ];
        $products =  $this->productRepository->trash($option);
        $categoryList =  $this->categoryRepository->has_products();
        return view('pages.products.trash', ['products' => $products, 'categoryList' => $categoryList]);
    }
    function store(ProductsRequest $req)
    {
        try {
            $dataProduct = [
                'name' => $req->name_product,
                'price' => $req->price_product,
                'description_image' => $req->file('description_image'),
                'slug' => Str::slug($req->name_product),
                'feature_image' => $req->file('feature_image'),
                'content' => $req->description ?? null,
                'id_category' => $req->category > 0 ? $req->category : null,
                'user_id' => Auth::id(),
                'brand_id' => $req->brand
            ];
            $product = $this->productRepository->create($dataProduct);

            $this->productsValidationRepository->create_by_products($product, $req->attr);

            $this->tagsRepository->create_by_products($product, $req->tags);
            return back()->with('message', ['content' => 'tạo sản phẩm thành công:' .  $product->id, 'type' => 'success']);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
            return back()->with('message', ['content' => 'Tạo sản phẩm thất bại', 'type' => 'error']);
        }
    }
    function updateStatus($id, $status)
    {
        try {
            $this->productRepository->updateStatus($id, $status);
            return back()->with('message', ['content' => 'Cập nhập sản phẩm thành công', 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('message', ['content' => 'Cập nhập sản phẩm thất bại', 'type' => 'error']);
        }
    }
    function edit(Request $req, $id)
    {
        try {
            $dataProduct = [
                'name' => $req->name_product,
                'price' => $req->price_product,
                'description_image' => $req->description_image,
                'slug' => Str::slug($req->name_product),
                'feature_image' => $req->feature_image,
                'content' => $req->description ?? null,
                'id_category' => $req->category,
                'brand_id' => $req->brand,
            ];
            $product = $this->productRepository->update($id, $dataProduct);
            $this->tagsRepository->update_by_products($product, $req->tags);
            $this->productsValidationRepository->update_by_products($product, $req->attr);
            return back()->with('message', ['content' => 'Cập nhập sản phẩm thành công', 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('message', ['content' => $e->getMessage(), 'type' => 'error']);
        }
    }
    function delete($id)
    {
        try {
            $product =   $this->productRepository->delete($id);
            return back()->with('message', ['content' => 'delete product tag success :' .   $product->id_product, 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('message', ['content' => 'delete product tag success :' . $e->getMessage(), 'type' => 'error']);
        }
    }
    function restore($id)
    {
        try {
            $this->productRepository->restore($id);
            return back()->with('message', ['content' => 'restore product success', 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('message', ['content' =>    $e->getMessage(), 'type' => 'error']);
        }
    }
    function destroy($id)
    {
        try {
            $this->productRepository->destroy($id);
            return back()->with('message', ['content' => 'delete product success', 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('message', ['content' => $e->getMessage(), 'type' => 'error']);
        }
    }
    function showForm($id = null)
    {
        try {
            if ($id != 0) {
                $detailProduct = $this->modelProducts->find($id);
            }
            return view('pages/products/form', ['detailProduct' => $detailProduct ?? []]);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }
    function export(Request $req)
    {
        $typeFile = explode('-', $req->type_file);
        $nameFile = $req->name_file . '.' . $typeFile[0];
        return Excel::download(new ProductsExport, $nameFile, constant('Maatwebsite\Excel\Excel::' . $typeFile[1]));
    }
}
