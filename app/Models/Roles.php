<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Roles extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'display_name',
        'description'
    ];
    function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permissions::class, 'permissions_role', 'id_role', 'id_permissions');
    }
    use HasFactory;
}
