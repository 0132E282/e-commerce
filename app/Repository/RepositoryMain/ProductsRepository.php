<?php

namespace App\Repository\RepositoryMain;

use App\Repository\RepositoriesInterface\ProductsRepositoryInterface;
use App\Models\Products;
use App\storage\StoreFactory;

class ProductsRepository extends BaseRepository implements ProductsRepositoryInterface
{

    protected $modal;
    protected $store;
    protected $file;
    protected $productsValidationRepository;
    function __construct()
    {
        $this->modal = new Products();
        $this->file = StoreFactory::initialize();
        $this->productsValidationRepository = new ProductsValidationRepository();
    }
    function all($options = null, $query = null)
    {
        $productsQueryBase = $this->modal->with('category')
            ->withMin('variations as min_price', 'price')
            ->withMax('variations as max_price', 'price')
            ->withSum('variations as quantity', 'quantity')
            ->orderByCustom($options['order'], $options['by'] ?? 'DESC')
            ->search($options['search'] ?? null)
            ->filter([...$options['filter'], 'status' => $options['status']]);
        return $productsQueryBase->paginate($options['paginate'] ?? null);
    }
    function shop($paginate = 15, $options = null, $query = null)
    {
        $productsQuery = $this->modal->with('category')
            ->withMin('variations as min_price', 'price')
            ->withMax('variations as max_price', 'price')
            ->orderByCustom($options['order'], $options['by'] ?? 'DESC')
            ->search($options['search'] ?? null)
            ->filter(['status' => 1, ...$options['filter'] ?? []]);
        return $productsQuery->paginate($paginate);
    }
    function shopSlider($type = null, $limit = 12)
    {
        $query =  $this->modal
            ->withMin('variations as min_price', 'price')
            ->withMax('variations as max_price', 'price')
            ->when($type == 'views', function ($query) {
                $query->orderBy('views_count', 'DESC');
            })
            ->when($type == 'order', function ($query) {
                dd($query->order_items);
                $query->orderBy('views_count', 'DESC');
            })
            ->orderBy('created_at', 'DESC')
            ->filter(['status' => 1]);
        return $query->limit($limit)->get();
    }
    function create($value, $options = [])
    {
        $value['feature_image'] = $this->file->uploadImage($value['feature_image'], 'products');
        $value['description_image'] = $this->file->uploadImageMultiple($value['description_image'], 'products');
        return $this->modal->create($value);
    }
    function update($id, $value, $options = [])
    {
        $product = $this->modal->find($id);
        $file = StoreFactory::initialize();
        if (!empty($value['feature_image'])) {
            $file->deletePath($product['feature_image']);
            $value['feature_image'] = $file->uploadImage($value['feature_image'], 'products');
        }
        $imagesList = $product->description_image ?? [];
        if (!empty($value['description_image'])) {
            if (!empty($imagesList) && count($imagesList) > 0) {
                foreach ($imagesList as $key => $image) {
                    if (array_key_exists($key, $value['description_image'])) {
                        $this->file->deletePath($image);
                        unset($imagesList[$key]);
                    }
                }
            }
            $imagesArr = $this->file->uploadImageMultiple($value['description_image'], 'products');
            $value['description_image'] = [...$imagesArr, ...$imagesList];
        } else {
            $value['description_image']  = $imagesList;
        }
        $product->update($value);
        return  $product;
    }
    function delete($id, $options = [])
    {
        $product = $this->modal->find($id);
        if (!$product->order_items->count() > 0) {
            $product->delete();
            return $product;
        } else {
            return false;
        }
    }
    function details($id, $option = null)
    {
        return $this->modal->find($id);
    }
    function updateStatus($id, $status, $option = null)
    {
        $product = $this->modal->findOrFail($id);
        $product->update(['status' => $status]);
        return $product;
    }
    function trash($options)
    {
        $products = $this->modal->onlyTrashed()->search($options['search'] ?? null)
            ->filter($options['filter'] ?? null);
        return   $products->paginate($options['paginate'] ?? null);
    }
    function restore($id)
    {
        $product = $this->modal->where('id', $id);
        return $product->withTrashed()->restore();
    }
    function destroy($id)
    {
        $product = $this->modal->onlyTrashed()->find($id);
        $this->file->deletePath($product->feature_image);
        if (!empty($product->description_image) && is_array($product->description_image)) {
            foreach ($product->description_image as $image) {
                $this->file->deletePath($image);
            }
        }
        return $product->forceDelete();
    }
    function export()
    {
        $productsVariants = (new ProductsValidationRepository())->all();
        return $productsVariants->transform(function ($variant) {
            return [
                'id' => $variant->id,
                'name' => $variant->product->name,
                'category' => $variant->product->category->name,
                'quantity' => $variant->quantity ?? 0,
                'color' => $variant->color,
                'size' => $variant->size,
                'price' => $variant->price,
                'reduced_price' => $variant->reduced_price ?? 0,
                'created_at' => $variant->created_at,
                'updated_at' => $variant->updated_at,
            ];
        });
    }
    function findVariants($id, $req)
    {
        return $this->modal->find($id)->variations()->when(!empty($req->color), function ($query) use ($req) {
            $query->where('color', $req->color);
        })->when(!empty($req->size), function ($query) use ($req) {
            $query->where('size', $req->size);
        })->when(!empty($req->id_variant), function ($query)  use ($req) {
            $query->where('id', $req->id_variant);
        })->get();
    }
}
