<?php

namespace App\Policies;

use App\Models\User;
use App\Models\reviews;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class ReviewsPolicy
{
    protected $configReviews;
    function __construct()
    {
        $this->configReviews = config('permissions.access.reviews.config');
    }
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user): bool
    {
        $keyCode = $this->configReviews['VIEW_REVIEWS']['key_code'];
        if (Auth::user()->email === 'admin01@admin.com' || $user->checkPermission($keyCode)) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
    }

    public function reply(User $user): bool
    {
        $keyCode = $this->configReviews['REPLY_REVIEWS']['key_code'];
        if (Auth::user()->email === 'admin01@admin.com' || $user->checkPermission($keyCode)) {
            return true;
        }
        return false;
    }
    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, reviews $reviews): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user): bool
    {
        $keyCode = $this->configReviews['DELETE_REVIEWS']['key_code'];
        if (Auth::user()->email === 'admin01@admin.com' || $user->checkPermission($keyCode)) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, reviews $reviews): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, reviews $reviews): bool
    {
        //
    }
}
