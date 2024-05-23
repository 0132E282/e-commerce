<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brands extends Model
{
    use SoftDeletes, HasFactory;
    protected $table = 'brands';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'name',  'slug', 'description', 'views_count', 'status', 'user_id'
    ];
    /**
     * Get the user that owns the Brands
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function products(): HasMany
    {
        return $this->hasMany(Products::class, 'brand_id');
    }
}
