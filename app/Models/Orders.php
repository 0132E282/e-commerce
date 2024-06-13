<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Orders extends Model
{
    use HasFactory, SoftDeletes, Notifiable;
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = [
        'customers_id',
        'status',
        'user_id',
        'tola',
        'fullname',
        'address',
        'phone',
        'email',
        'payment',
        'phone_verified_at',
        'paid_at',
        'trading_code',
        'note'
    ];
    function order_items(): HasMany
    {
        return $this->hasMany(OrderItems::class, 'order_id');
    }
    function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    function scopeSearch($query, $search = null)
    {
        $textSearch = '%' . $search . '%';
        $query->when(isset($search), function ($query) use ($textSearch) {
            $query->where('trading_code', 'like', $textSearch)
                ->orWhere('email', 'like', $textSearch)
                ->orWhere('phone', 'like', $textSearch)
                ->orWhere('fullname', 'like', $textSearch)
                ->orWhereHas('user', function ($query) use ($textSearch) {
                    $query->where('name', 'like', $textSearch);
                });
        });
        return $query;
    }

    function scopeFilter($query, $option)
    {
        $query->when(isset($option['status']), function ($query) use ($option) {
            $status =  $option['status'] === 'confirmed' ? 1  : ($option['status']  === 'cancelled' ? 0 :  null);
            $query->where('status', '=', $status);
        });

        $query->when(!empty($option['area']), function ($query) use ($option) {
            $query->where('address->provinces', $option['area']);
        });

        $query->when(!empty($option['price']), function ($query) use ($option) {
            $price = explode('_', $option['price']);
            $priceStart = $price[0] ?? 0;
            $priceEnd = !empty($price[1]) ? $price[1] : PHP_INT_MAX;
            $query->whereHas('order_items', function ($query) use ($priceStart, $priceEnd) {
                $query->selectRaw('SUM(order_items.price * order_items.quantity) as total_price')
                    ->groupBy('order_items.order_id')
                    ->havingRaw('total_price BETWEEN ? AND ?', [$priceStart, $priceEnd]);
            });
        });
        $query->when(!empty($option['created']), function ($query) use ($option) {
            $date = explode('_', $option['created']);
            $dateStart = $date[0] ?? Carbon::now();
            $dateEnd = $date[1] ?? Carbon::now();
            $query->whereDate('created_at', '<=', $dateEnd)->whereDate('created_at', '>=', $dateStart);
        });
        return $query;
    }
}
