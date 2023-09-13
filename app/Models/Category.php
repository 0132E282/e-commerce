<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $table = 'category';
    protected $primaryKey = 'id_category';
    protected $fillable = [
        'name_category', 'parent_id', 'slug_category'
    ];
    use HasFactory;
}
