<?php

namespace App\Services;

use App\Models\Admin;
use App\Policies\AdminPolicy;
use App\Policies\LevelPolicy;
use App\Policies\PermissionPolicy;
use App\Policies\RolePolicy;
use App\Policies\RoomPolicy;
use App\Policies\SpecialistPolicy;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Gate;

class DefinePolicies {

    // Gate define role
    public function roleDefine (){
        Gate::define('role-list', [RolePolicy::class, 'view']);
        Gate::define('role-add', [RolePolicy::class, 'create']);
        Gate::define('role-edit', [RolePolicy::class, 'update']);
        Gate::define('role-delete', [RolePolicy::class, 'delete']);
    }

    // Gate define permission
    public function permissionDefine (){
        Gate::define('permission-list', [PermissionPolicy::class, 'view']);
        Gate::define('permission-add', [PermissionPolicy::class, 'create']);
        Gate::define('permission-edit', [PermissionPolicy::class, 'update']);
        Gate::define('permission-delete', [PermissionPolicy::class, 'delete']);
    }

    // Gate define level
    public function levelDefine (){
        Gate::define('level-list', [LevelPolicy::class, 'view']);
        Gate::define('level-add', [LevelPolicy::class, 'create']);
        Gate::define('level-edit', [LevelPolicy::class, 'update']);
        Gate::define('level-delete', [LevelPolicy::class, 'delete']);
    }

    // Gate define room
    public function roomDefine (){
        Gate::define('room-list', [RoomPolicy::class, 'view']);
        Gate::define('room-add', [RoomPolicy::class, 'create']);
        Gate::define('room-edit', [RoomPolicy::class, 'update']);
        Gate::define('room-delete', [RoomPolicy::class, 'delete']);
    }

    // Gate define specialist
    public function specialistDefine (){
        Gate::define('specialist-list', [SpecialistPolicy::class, 'view']);
        Gate::define('specialist-add', [SpecialistPolicy::class, 'create']);
        Gate::define('specialist-edit', [SpecialistPolicy::class, 'update']);
        Gate::define('specialist-delete', [SpecialistPolicy::class, 'delete']);
    }

    // Gate define admin
    public function adminDefine (){
        Gate::define('admin-list', [AdminPolicy::class, 'view']);
        Gate::define('admin-add', [AdminPolicy::class, 'create']);
        Gate::define('admin-edit', [AdminPolicy::class, 'update']);
        Gate::define('admin-delete', [AdminPolicy::class, 'delete']);
    }

    // Gate define user
    public function userDefine (){
        Gate::define('user-list', [UserPolicy::class, 'view']);
        Gate::define('user-add', [UserPolicy::class, 'create']);
        Gate::define('user-edit', [UserPolicy::class, 'update']);
        Gate::define('user-delete', [UserPolicy::class, 'delete']);
    }
}
