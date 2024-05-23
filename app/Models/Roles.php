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
        'description'
    ];
    function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_role', 'id_role', 'id_user');
    }
    function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permissions::class, 'permissions_role', 'role_id', 'permission_id');
    }
    use HasFactory;
}
