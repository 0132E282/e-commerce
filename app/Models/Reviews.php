<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Reviews extends Model
{
    use HasFactory;
    protected $table = "reviews";
    protected $primaryKey = 'id';
    protected $fillable = ['id_user', 'name', 'parent_id', 'content', 'rating', 'name', 'email', 'product_id'];
    function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    function product(): BelongsTo
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
    function children(): HasMany
    {
        return $this->hasMany(Reviews::class, 'parent_id');
    }
    function scopeSearch($query, $search)
    {
        $textSearch = '%' . $search . '%';
        $query->when(!empty($search), function ($query) use ($textSearch) {
            $query->where('name', 'LIKE', $textSearch)->orWhere('email', 'LIKE', $textSearch)
                ->whereHas('product', function ($query) use ($textSearch) {
                    $query->where('name', 'LIKE', $textSearch);
                });
        });
    }
    function scopeFilter($query, $filter)
    {
        $query->when(!empty($filter['created']), function ($query) use ($filter) {
            $price = explode('_', $filter['created']);
            $query->whereDate('created_at', '<=', $price[1])->whereDate('created_at', '>=', $price[0]);
        });
    }
}
