<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sliders extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'sliders';
    protected $primaryKey = 'id_slider';
    protected $fillable = ['name_slider', 'description_slider',  'image_url'];
}
