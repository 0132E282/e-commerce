<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes, HasFactory;
    protected $table = 'category';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'name', 'parent_id', 'slug', 'description', 'views_count', 'status'
    ];
    public function products(): HasMany
    {
        return $this->hasMany(Products::class, 'id_category');
    }
    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
    public function getAllDescendantCategories()
    {
        $categories = new Collection([$this]);
        foreach ($this->children as $child) {
            $categories = $categories->merge($child->getAllDescendantCategories());
        }
        return $categories;
    }
}
