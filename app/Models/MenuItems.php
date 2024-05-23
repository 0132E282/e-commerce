<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuItems extends Model
{
    use  HasFactory;
    protected $table = 'menu_item';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'link', 'location', 'type', 'parent_id', 'menu_id', 'description'];
    function children(): HasMany
    {
        return $this->hasMany(MenuItems::class, 'parent_id');
    }
}
