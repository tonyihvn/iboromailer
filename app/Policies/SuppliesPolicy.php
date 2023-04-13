<?php

namespace App\Policies;

use App\Models\User;
use App\Models\supplies;
use Illuminate\Auth\Access\HandlesAuthorization;

class SuppliesPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\supplies  $supplies
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, supplies $supplies)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\supplies  $supplies
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, supplies $supplies)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\supplies  $supplies
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, supplies $supplies)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\supplies  $supplies
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, supplies $supplies)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\supplies  $supplies
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, supplies $supplies)
    {
        //
    }
}
