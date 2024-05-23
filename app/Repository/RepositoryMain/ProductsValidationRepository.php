<?php

namespace App\Repository\RepositoryMain;

use App\Models\Products;
use App\Models\ProductVariants;
use App\Repository\RepositoriesInterface\ProductsValidationRepositoryInterface;

class ProductsValidationRepository extends BaseRepository implements ProductsValidationRepositoryInterface
{
    protected $modal;
    function __construct()
    {
        $this->modal = new ProductVariants();
    }
    function dataTransform($value, $product)
    {
        return collect($value)->transform(function ($data)  use ($product) {
            return [
                'name' => $product->name . ' ' . $data['color'] . '-' . $data['size'],
                'color' => $data['color'],
                'price' => $data['price'],
                'quantity' => $data['quantity'],
                'size' => $data['size'],
                'quantity' => $data['quantity'],
                'reduced_price' => $data['sale']
            ];
        });
    }
    function allByProduct($product_id, $option = null)
    {
        $product = Products::find($product_id);
        $product['variations'] = $product->variations;
        return $product;
    }
    function all($options = null)
    {
        return $this->modal->where('product_id', '=', $options['product_id'])->get();
    }
    function create_by_products($product, $value)
    {
        $data = $this->dataTransform($value, $product);
        return $product->variations()->createMany($data);
    }
    function update_by_products($product, $value)
    {
        $data = $this->dataTransform($value, $product);
        $variants  = [];
        foreach ($data as $value) {
            $variants[] = $product->variations()->updateOrCreate(['product_id' => $product->id, 'color' => $value['color'], 'size' => $value['size']], $value);
        }
        return collect($variants);
    }
    function create($value, $options = [])
    {
    }
    function details($id, $option = null)
    {
        return $this->modal->find($id);
    }
    function delete($id, $options = [])
    {
    }
    function update($id, $value, $options = [])
    {
    }
    function topProductByOrder()
    {
        return $this->modal->limit(10)->get();
    }
}
