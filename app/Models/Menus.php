<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menus extends Model
{
    use SoftDeletes;
    protected $table = 'menus';
    protected $primaryKey = 'id_menus';
    protected $fillable = ['name_menus', 'route', 'parent_id', 'slug'];
    function menusChildren(): HasMany
    {
        return $this->hasMany(Menus::class, 'parent_id');
    }
    use HasFactory;
}
