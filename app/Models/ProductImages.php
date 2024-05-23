<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductImages extends Model
{
    use SoftDeletes, HasFactory;
    protected $table = 'product_images';
    protected $primaryKey = 'id_image';
    protected $fillable = ['path', 'id_product'];
}
