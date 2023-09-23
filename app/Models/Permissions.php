<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Permissions extends Model
{
    protected $table = 'permissions';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'display_name', 'parent_id', 'key_code'];
    function permissionsChildren(): HasMany
    {
        return $this->HasMany(Permissions::class, 'parent_id');
    }
    use HasFactory;
}
