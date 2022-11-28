<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\User;
use App\Models\WebSetting;
use Illuminate\Auth\Access\HandlesAuthorization;

class WebSettingPolicy
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
     * @param  \App\Models\WebSetting  $webSetting
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Admin $user)
    {
        return $user->checkPermission('List_Web_settings');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Admin $user)
    {
        return $user->checkPermission('Add_Web_settings');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\WebSetting  $webSetting
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Admin $user)
    {
        return $user->checkPermission('Edit_Web_settings');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\WebSetting  $webSetting
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Admin $user)
    {
        return $user->checkPermission('Delete_Web_settings');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\WebSetting  $webSetting
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, WebSetting $webSetting)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\WebSetting  $webSetting
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, WebSetting $webSetting)
    {
        //
    }
}
