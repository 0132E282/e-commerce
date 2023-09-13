<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tags extends Model
{
    use SoftDeletes;
    protected $table = 'tags';
    protected $primaryKey = 'id_tag';
    protected $fillable = ['name_tag'];
    use HasFactory;
}
