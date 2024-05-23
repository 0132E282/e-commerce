<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menus extends Model
{
    use SoftDeletes, HasFactory;
    protected $table = 'menus';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'location', 'description', 'user_id', 'hidden'];
    function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    function menu_items(): HasMany
    {
        return $this->hasMany(MenuItems::class, 'menu_id');
    }
}
