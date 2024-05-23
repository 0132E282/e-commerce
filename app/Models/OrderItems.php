<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrderItems extends Model
{
    protected $table = 'order_items';
    protected $primaryKey = 'id';
    protected $fillable = ['variation_id', 'order_id', 'quantity', 'price'];
    function variation(): BelongsTo
    {
        return $this->BelongsTo(ProductVariants::class, 'variation_id');
    }

    use HasFactory;
}
