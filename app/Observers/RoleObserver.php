<?php

namespace App\Observers;

use App\Jobs\PermissionSyncJob;
use Spatie\Permission\Models\Role;

class RoleObserver
{
    /**
     * Handle the Role "created" event.
     *
     * @param  Role  $role
     * @return void
     */
    public function created(Role $role)
    {
        dispatch(new PermissionSyncJob($role->id, request()->input('permissions')));
        session()->flash('success', 'Role successfully created');
    }

    /**
     * Handle the Role "updated" event.
     *
     * @param  Role  $role
     * @return void
     */
    public function updated(Role $role)
    {
        session()->flash('success', 'Role successfully updated');
    }

    /**
     * Handle the Role "deleted" event.
     *
     * @param  Role  $role
     * @return void
     */
    public function deleted(Role $role)
    {
        session()->flash('success', 'Role successfully deleted');
    }

    /**
     * Handle the Role "restored" event.
     *
     * @param  Role  $role
     * @return void
     */
    public function restored(Role $role)
    {
        session()->flash('success', 'Role successfully restored');
    }

    /**
     * Handle the Role "force deleted" event.
     *
     * @param  Role  $role
     * @return void
     */
    public function forceDeleted(Role $role)
    {
        session()->flash('success', 'Role permanently deleted');
    }
}
