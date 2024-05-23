<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductVariants extends Model
{
    use HasFactory;
    protected $table = "product_variations";
    protected $primaryKey = 'id';
    protected $fillable = ['product_id', 'name', 'color', 'size', 'price', 'quantity', 'reduced_price', 'created_at', 'updated_at', 'feature_image'];
    public function product(): BelongsTo
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
}
