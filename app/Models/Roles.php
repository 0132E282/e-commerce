<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Roles extends Model
{
    use SoftDeletes;
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
