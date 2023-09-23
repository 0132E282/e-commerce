<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Orders extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = ['customers_id', 'status', 'user_id'];
    function orderItems(): HasMany
    {
        return $this->hasMany(OrderItems::class, 'order_id');
    }
    public function customers(): BelongsTo
    {
        return $this->belongsTo(Customers::class, 'customers_id');
    }
    use HasFactory;
}
