<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tags extends Model
{
    use HasFactory;
    protected $table = 'tags';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'id_product'];
}
