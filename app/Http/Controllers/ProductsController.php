<?php

namespace App\Http\Controllers;

use App\Components\StorageImage;
use App\Components\UploadFiles;
use App\Http\Requests\ProductsValidation;
use App\Models\Products;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;

class ProductsController extends Controller
{
    protected $modelProducts;
    function __construct()
    {
        $this->modelProducts = new Products();
        Paginator::useBootstrapFive();
    }

    function index()
    {
        $productList  = $this->modelProducts->leftJoin('category', 'products.id_category', 'category.id_category')->orderBy('products.created_at', 'DESC')->paginate(25);
        return view('pages/products/index', ['productList' => $productList]);
    }
    function trash()
    {
        $productList =  $this->modelProducts->leftJoin('category', 'products.id_category', 'category.id_category')->orderBy('products.deleted_at', 'DESC')->onlyTrashed()->paginate(25);
        return view('pages/products/index', ['productList' => $productList]);
    }
    function store(ProductsValidation $req)
    {
        try {
            $idUserAuth = Auth::user();
            if ($req->hasFile('feature_image')) {
                $imagePath =   StorageImage::uploadImage($req->feature_image, 'products', 556, 600);
            }
            $product = $this->modelProducts->create([
                'name_product' => $req->name_product,
                'price_product' => $req->price_product,
                'slug_product' => Str::slug($req->name_product),
                'feature_image' => $imagePath,
                'content' => $req->content_product ?? null,
                'id_category' => $req->id_category > 0 ? $req->id_category : null,
                'id_user' => $idUserAuth->id
            ]);
            if ($req->has('product_images')) {
                foreach ($req->product_images as $image) {
                    $imagePath =   StorageImage::uploadImage($image, 'products', 556, 600);
                    $product->productImages()->create([
                        'path' => $imagePath,
                    ]);
                }
            }
            if ($req->tags_products) {
                foreach ($req->tags_products as $value) {
                    $product->tags()->firstOrCreate(['name_tag' => $value]);
                }
            }
            return back()->with('message', ['content' => 'crete product success id :' .  $product->id_product, 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('error', 'crete product  failed :' . $e->getMessage());
        }
    }

    function edit(ProductsValidation $req, $id)
    {

        try {
            $idUserAuth = Auth::user();
            $product = $this->modelProducts->find($id);
            if ($req->hasFile('feature_image')) {
                if ($product->feature_image) {
                    $pathDelete = StorageImage::deleteImagePath($product, 'feature_image');
                }
                $imagePath = StorageImage::uploadImage($req->feature_image, 'products', 556, 600);
            }
            $product->update([
                'name_product' => $req->name_product ?? $product->name_product,
                'price_product' => $req->price_product ?? $product->price_product,
                'slug_product' => Str::slug($req->name_product),
                'feature_image' => $imagePath ?? $product->feature_image,
                'content' => $req->content_product ?? $req->content,
                'id_category' => $req->id_category > 0 ? $req->id_category : null ?? $product->id_category,
                'id_user' => $idUserAuth->id
            ]);

            if ($req->hasFile('product_images')) {
                $productImage =  $product->productImages();
                $pathDelete = StorageImage::deleteImagePath($productImage->get(), 'path');
                if ($pathDelete) {
                    $productImage->delete();
                }
                foreach ($req->product_images as $image) {
                    $imagePath = StorageImage::uploadImage($image, 'products', 556, 600);
                    $product->productImages()->create([
                        'path' => $imagePath,
                    ]);
                }
            }
            if ($req->tags_products) {
                $tags = [];
                foreach ($req->tags_products as $value) {
                    $productsTags  =  $product->tags()->firstOrCreate(['name_tag' => $value]);
                    $tags[] = $productsTags->id_tag;
                }
                $product->tags()->sync($tags);
            }

            return back()->with('message', ['content' => 'update product success id :' .  $product->id_product, 'type' => 'success']);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
            return back()->with('error', 'crete product  failed :' . $e->getMessage());
        }
    }
    function delete($id)
    {
        try {
            $product = $this->modelProducts->find($id);
            $product->delete();
            return back()->with('message', ['content' => 'delete product tag success :' .   $product->id_product, 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('message', ['content' => 'delete product tag success :' . $e->getMessage(), 'type' => 'error']);
        }
    }
    function restore($id)
    {
        try {
            $product = $this->modelProducts->where('id_product', $id);
            $product->withTrashed()->restore();
            return back()->with('message', ['content' => 'restore product success', 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('message', ['content' =>    $e->getMessage(), 'type' => 'error']);
        }
    }
    function destroy($id)
    {
        try {
            $product = $this->modelProducts->onlyTrashed()->find($id);
            if (empty($product->first()->feature_image)) {
                StorageImage::deleteImagePath($product, 'feature_image');
            }
            $productImage = $product->productImages;
            if (count($productImage) > 0) {
                StorageImage::deleteImagePath($productImage, 'path');
                $product->productImages()->forceDelete();
            }
            $product->update(['id_category' => null]);
            $product->tags()->sync([]);
            $product->forceDelete();
            return back()->with('message', ['content' => 'delete product success', 'type' => 'success']);
        } catch (Exception $e) {
            return back()->with('message', ['content' => $e->getMessage(), 'type' => 'error']);
        }
    }
    function showForm($id = null)
    {
        try {
            $form = [
                'route' => route('create-product'),
                'method' => 'post',
                'data' => []
            ];
            if ($id != 0) {
                $detailProduct = $this->modelProducts->find($id);
                $detailProduct['images'] = $detailProduct->productImages()->get();
                $detailProduct['tags'] = $detailProduct->tags()->get();
                $form = [
                    'route' => route('update-product', $id),
                    'method' => 'put',
                    'data' =>  $detailProduct
                ];
            }
            return view('pages/products/form', ['form' => $form,  'valueBread' => $form['data'] ?? '']);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
