<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use SoftDeletes, HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $casts = [
        'description_image' => 'array',
    ];
    protected $fillable = ['name', 'status',  'slug', 'content', 'feature_image', 'id_category', 'id_user', 'description_image', 'brand_id', 'user_id'];



    public function category(): BelongsTo
    {
        return $this->BelongsTo(Category::class, 'id_category');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tags::class, 'product_tags', 'id_product', 'id_tag',);
    }

    public function variations(): HasMany
    {
        return $this->hasMany(ProductVariants::class, 'product_id');
    }
    public function order_items(): HasManyThrough
    {
        return $this->hasManyThrough(OrderItems::class, ProductVariants::class, 'product_id', 'variation_id');
    }
    function brand(): BelongsTo
    {
        return $this->belongsTo(Brands::class, 'brand_id');
    }
    function scopeFilter($query, $filter = [])
    {
        $query->when(!empty($filter['category']), function ($query) use ($filter) {
            $query->where('id_category', $filter['category']);
        });
        $query->when(!empty($filter['brand']), function ($query) use ($filter) {
            $query->where('brand_id', '=', $filter['brand']);
        });
        $query->when(!empty($filter['created']), function ($query) use ($filter) {
            $price = explode('_', $filter['created']);
            $query->whereDate('created_at', '<=', $price[1])->whereDate('created_at', '>=', $price[0]);
        });
        $query->when(!empty($filter['price']), function ($query) use ($filter) {
            $price = explode('_', $filter['price']);
            $query->having('min_price', '<=', $price[1])->having('max_price', '>=', $price[0]);
        });
        $query->when(!empty($filter['quantity']), function ($query) use ($filter) {
            $quantity = explode('_', $filter['quantity']);
            $query->havingBetween('quantity', $quantity);
        });
        $query->when(!empty($filter['status']) || $filter['status'] === 0, function ($query) use ($filter) {
            $query->where('status', '=', $filter['status']);
        });
        return $query;
    }
    function scopeSearch($query, $search)
    {
        $query->when(!empty($search), function ($query) use ($search) {
            $search = "%" . $search . "%";
            $query->where('name', 'LIKE', $search)->orWhereHas('category', function ($query) use ($search) {
                $query->where('name', 'LIKE', $search);
            });
        });
        return $query;
    }
    function scopeOrderByCustom($query, $order, $by = 'DESC')
    {
        $query->when(!empty($order), function ($query) use ($order, $by) {
            $options = [
                'price' => 'min_price',
                'view' => 'views_count',
                'created' => 'created_at',
                'category' => 'id_category',
                'quantity' => 'quantity',
                'created_at' => 'created_at',
            ];
            $query->orderBy($options[$order], $by);
        });
        return $query;
    }
}
