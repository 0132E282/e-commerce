<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Customers extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'address', 'email', 'phone_number'];
    function orders(): HasMany
    {
        return $this->hasMany(Orders::class, 'customers_id');
    }
    public function orderOrderItem(): HasManyThrough
    {
        return $this->hasManyThrough(OrderItems::class, Orders::class, 'customers_id', 'order_id');
    }
    use HasFactory;
}
