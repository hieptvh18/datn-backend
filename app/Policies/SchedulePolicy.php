<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SchedulePolicy
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
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Admin $user)
    {
        return $user->checkPermission('List_Schedules');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Admin $user)
    {
        return $user->checkPermission('Add_Schedules');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Admin $user)
    {
        return $user->checkPermission('Edit_Schedules');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Admin $user)
    {
        return $user->checkPermission('Delete_Schedules');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Schedule $schedule)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Schedule $schedule)
    {
        //
    }
}
