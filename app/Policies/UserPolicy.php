<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function boot(): void
    {
        Gate::before(function ($user, $ability) {
            return $user->is_admin ? true : null;

        });
    }
    public function viewAny(User $user): bool
    {
        return $user->is_admin; // admin can list users
    }

    public function view(User $user, User $target): bool
    {
        return $user->is_admin || $user->id === $target->id;
    }

    public function create(User $user): bool
    {
        return $user->is_admin;
    }

    public function update(User $user, User $target): bool
    {
        return $user->is_admin || $user->id === $target->id;
    }

    public function delete(User $user, User $target): bool
    {
        return $user->is_admin && $user->id !== $target->id; // no deleting self for safety
    }

}
