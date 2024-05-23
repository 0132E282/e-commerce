<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sliders extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'sliders';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'content', 'location', 'links', 'image_url', 'views_count', 'user_id'];
    function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
