<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use SoftDeletes;
    protected $table = 'products';
    protected $primaryKey = 'id_product';
    protected $fillable = ['name_product', 'price_product', 'slug_product', 'content', 'feature_image', 'id_category', 'id_user'];
    use HasFactory;
    public function productImages(): HasMany
    {
        return $this->hasMany(ProductImages::class, 'id_product');
    }
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tags::class, 'product_tags', 'id_product', 'id_tag');
    }
}
