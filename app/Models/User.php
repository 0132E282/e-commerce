<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar_url',
        'status',
        'google_id',
        'facebook_id',
        'loginBy'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    function roles(): BelongsToMany
    {
        return $this->belongsToMany(Roles::class, 'user_role', 'id_user', 'id_role');
    }
    function categories(): HasMany
    {
        return $this->hasMany(Category::class, 'user_id');
    }
    function reviews(): HasMany
    {
        return $this->hasMany(Reviews::class, 'id_user');
    }
    function products(): HasMany
    {
        return $this->hasMany(Products::class, 'user_id');
    }
    function orders(): HasMany
    {
        return $this->hasMany(Orders::class, 'user_id');
    }
    function checkPermission($keyCode)
    {
        $roles = Auth::user()->roles;
        foreach ($roles as $role) {
            $permissions = $role->permissions;
            if ($permissions->contains('key_code', $keyCode)) {
                return true;
            }
        }
        return false;
    }
    function scopeFilters($query, $filters)
    {
        $query->when(!empty($filters['role']), function ($query) use ($filters) {
            $query->whereHas('roles', function ($query) use ($filters) {
                $query->where('id_role', $filters['role']);
            });
        });
        $query->when(!empty($filters['created']), function ($query) use ($filters) {
            $created = explode('_', $filters['created']);
            $query->whereDate('created_at', '<=', $created[1])->whereDate('created_at', '>=', $created[0]);
        });
        $query->when(isset($filters['status']) && $filters['status'] !== null, function ($query) use ($filters) {
            $query->where('status', $filters['status']);
        });
        return $query;
    }
    function scopeSearch($query, $search)
    {
        $textSearch = "%" . $search . "%";
        return $query->where('name', "LIKE", $textSearch)->orWhere('email', 'LIKE',  $textSearch);
    }
}
