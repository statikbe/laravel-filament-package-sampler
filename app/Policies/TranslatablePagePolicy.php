<?php

namespace App\Policies;

use App\Models\TranslatablePage;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TranslatablePagePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //implement a proper policy for production use:
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, TranslatablePage $translatablePage): bool
    {
        //implement a proper policy for production use:
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //implement a proper policy for production use:
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, TranslatablePage $translatablePage): bool
    {
        //implement a proper policy for production use:
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, TranslatablePage $translatablePage): bool
    {
        //implement a proper policy for production use:
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, TranslatablePage $translatablePage): bool
    {
        //implement a proper policy for production use:
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, TranslatablePage $translatablePage): bool
    {
        //implement a proper policy for production use:
        return true;
    }
}
