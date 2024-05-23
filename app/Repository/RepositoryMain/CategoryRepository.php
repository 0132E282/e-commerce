<?php

namespace App\Repository\RepositoryMain;

use App\Models\Category;
use App\Repository\RepositoriesInterface\CategoryRepositoryInterface;
use Illuminate\Support\Facades\Log;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    protected $modal;

    function __construct()
    {
        $this->modal = new Category();
    }
    function filterCategory($baseQuery, $options, $query = null)
    {
        return $baseQuery
            ->when(isset($options['status']), function ($query) use ($options) {
                return $query->where('status', '=', $options['status']);
            })
            ->when(isset($options['order']) || isset($options['by']), function ($query) use ($options) {
                return  $query->orderBy($options['order'], $options['by']);
            })
            ->when(isset($options['views']), function ($query) use ($options) {
                $viewBetween = explode('_', $options['views']);
                $query->whereBetween('views_count', $viewBetween)
                    ->orWhereHas('children', function ($query) use ($viewBetween) {
                        $query->whereBetween('views_count', $viewBetween);
                    });
            })
            ->when(isset($options['products']), function ($query) use ($options) {
                $products = explode('_', $options['products']);
                $query->having('quantity_products', '>=', $products[0])->having('quantity_products', '<=', $products[1]);
            })
            ->when(isset($options['created']), function ($query) use ($options) {
                $created = explode('_', $options['created']);
                $query->whereDate('created_at', '>=', $created[0])->whereDate('created_at', '<=', $created[1])
                    ->orWhereHas('children', function ($query) use ($created) {
                        $query->whereDate('created_at', '>=', $created[0])->whereDate('created_at', '<=', $created[1]);
                    });
            })
            ->when(isset($options['search']), function ($query) use ($options) {
                $searchText = "%" . $options['search'] . '%';
                $query->where('name', 'LIKE', $searchText)
                    ->orWhereHas('children', function ($query) use ($searchText) {
                        $query->where('name', 'LIKE', $searchText);
                    });
            })
            ->when(isset($query), function ($queryBuilder) use ($query) {
                return call_user_func($query, $queryBuilder);
            });
    }
    function all($options = [], $query = null)
    {
        $categoryBase = $this->modal->whereNull('parent_id')
            ->withCount('products as quantity_products')
            ->with('children', function ($query) {
                $query->withCount('products as quantity_products');
            })->whereNull('parent_id');
        $category = $this->filterCategory($categoryBase, $options, $query);
        return  $category->paginate($options['paginate'] ?? null);
    }
    function create($value, $options = [])
    {
        return $this->modal->create($value);
    }
    function delete($id, $options = [])
    {
        $category = $this->modal->find($id);
        if ($category->products->count() > 0) {
            Log::error("không thể xóa khi sản phẩm đã có sản phẩm");
            return false;
        }
        return $category->delete();
    }
    function trash($options)
    {
        $categoryBase =   $this->modal->onlyTrashed();
        $category = $this->filterCategory($categoryBase, $options);
        return $category->paginate(25);
    }
    function details($id, $option = [], $query = null)
    {
        if (!empty($id)) {
            return $this->modal->find($id);
        }
        return [];
    }
    function update($id, $value, $options = [])
    {
        $category = $this->modal->find($id);
        if ($category->count() > 0) {
            return $category->update($value);
        }
        return false;
    }
    function destroy($id, $options = [])
    {
        $category =  $this->modal->onlyTrashed()->find($id);
        return  $category->forceDelete();
    }
    function restore($id, $options = [])
    {
        $category = $this->modal->onlyTrashed()->find($id);
        $parentCategory = $this->modal->where('parent_id', $id);
        if ($category->parent_id > 0) {
            $category->update(['parent_id' => 0]);
        }
        $category->restore();
        $parentCategory->restore();
    }
    function export()
    {
        $category = $this->modal->all();
        return $category->transform(function ($category) {
            return [
                'id' => $category->id,
                'name' => $category->name,
                'description' => $category->description,
                'children_count' => $category->children->count(),
                'product_count' => $category->products->count(),
                'order_count' => $category->products->count(),
                'created_at' => $category->created_at,
                'update_at' => $category->updated_at,
            ];
        });
    }

    function has_products($options = [], $query = null)
    {
        $category = $this->modal->whereNull('parent_id')
            ->withCount('products as quantity_products')
            ->with('children', function ($query) {
                $query->whereHas('products')->orWhereHas('children', function ($query) {
                    $query->whereHas('products');
                });
            })->whereNull('parent_id')->whereHas('products')->orWhereHas('children', function ($query) {
                $query->whereHas('products');
            });
        return $category->paginate($options['paginate'] ?? null);
    }
    function updateStatus($id)
    {
        $category =  $this->modal->find($id);
        return  $category->update(['status' => $category->status == 1 ? 0 : 1]);
    }
}
