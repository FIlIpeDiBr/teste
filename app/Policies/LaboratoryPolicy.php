<?php

namespace App\Policies;

use Illuminate\Auth\Access\Authorizable;
use Illuminate\Auth\Access\Response;
use App\Models\User;

class LaboratoryPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function view(?User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function viewOne(?User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(?User $user): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(?User $user): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(?User $user): bool
    {
        return $user->role === 'admin';
    }
}
