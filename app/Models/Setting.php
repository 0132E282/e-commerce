<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    use SoftDeletes;
    protected $table = 'setting';
    protected $primaryKey = 'id_setting';
    protected $fillable = ['key_setting', 'value_setting'];
    use HasFactory;
}
