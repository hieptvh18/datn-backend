<?php

namespace App\Services;

use App\Models\Admin;
use App\Policies\AdminPolicy;
use App\Policies\EquipmentPolicy;
use App\Policies\FeedBackPolicy;
use App\Policies\LevelPolicy;
use App\Policies\New_CategoryPolicy;
use App\Policies\NewsPolicy;
use App\Policies\OrderPolicy;
use App\Policies\PatientPolicy;
use App\Policies\PermissionPolicy;
use App\Policies\ProductPolicy;
use App\Policies\ProductTypePolicy;
use App\Policies\RolePolicy;
use App\Policies\RoomPolicy;
use App\Policies\SchedulePolicy;
use App\Policies\ServicePolicy;
use App\Policies\SpecialistPolicy;
use App\Policies\UserPolicy;
use App\Policies\WebSettingPolicy;
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

    // Gate define patient
    public function patientDefine (){
        Gate::define('patient-list', [PatientPolicy::class, 'view']);
        Gate::define('patient-add', [PatientPolicy::class, 'create']);
        Gate::define('patient-edit', [PatientPolicy::class, 'update']);
        Gate::define('patient-delete', [PatientPolicy::class, 'delete']);
    }

    // Gate define schedule
    public function scheduleDefine (){
        Gate::define('schedule-list', [SchedulePolicy::class, 'view']);
        Gate::define('schedule-add', [SchedulePolicy::class, 'create']);
        Gate::define('schedule-edit', [SchedulePolicy::class, 'update']);
        Gate::define('schedule-delete', [SchedulePolicy::class, 'delete']);
    }

    // Gate define service
    public function serviceDefine (){
        Gate::define('service-list', [ServicePolicy::class, 'view']);
        Gate::define('service-add', [ServicePolicy::class, 'create']);
        Gate::define('service-edit', [ServicePolicy::class, 'update']);
        Gate::define('service-delete', [ServicePolicy::class, 'delete']);
    }

    // Gate define product
    public function productDefine (){
        Gate::define('product-list', [ProductPolicy::class, 'view']);
        Gate::define('product-add', [ProductPolicy::class, 'create']);
        Gate::define('product-edit', [ProductPolicy::class, 'update']);
        Gate::define('product-delete', [ProductPolicy::class, 'delete']);
    }

    // Gate define product type
    public function productTypeDefine (){
        Gate::define('productType-list', [ProductTypePolicy::class, 'view']);
        Gate::define('productType-add', [ProductTypePolicy::class, 'create']);
        Gate::define('productType-edit', [ProductTypePolicy::class, 'update']);
        Gate::define('productType-delete', [ProductTypePolicy::class, 'delete']);
    }

    // Gate define equipment
    public function equipmentDefine (){
        Gate::define('equipment-list', [EquipmentPolicy::class, 'view']);
        Gate::define('equipment-add', [EquipmentPolicy::class, 'create']);
        Gate::define('equipment-edit', [EquipmentPolicy::class, 'update']);
        Gate::define('equipment-delete', [EquipmentPolicy::class, 'delete']);
    }

    // Gate define order
    public function orderDefine (){
        Gate::define('order-list', [OrderPolicy::class, 'view']);
        Gate::define('order-add', [OrderPolicy::class, 'create']);
        Gate::define('order-edit', [OrderPolicy::class, 'update']);
        Gate::define('order-delete', [OrderPolicy::class, 'delete']);
    }

    // Gate define web setting
    public function webSettingDefine (){
        Gate::define('webSetting-list', [WebSettingPolicy::class, 'view']);
        Gate::define('webSetting-add', [WebSettingPolicy::class, 'create']);
        Gate::define('webSetting-edit', [WebSettingPolicy::class, 'update']);
        Gate::define('webSetting-delete', [WebSettingPolicy::class, 'delete']);
    }
    // Gate define new category
    public function newCategoryDefine (){
        Gate::define('newCategory-list', [New_CategoryPolicy::class, 'view']);
        Gate::define('newCategory-add', [New_CategoryPolicy::class, 'create']);
        Gate::define('newCategory-edit', [New_CategoryPolicy::class, 'update']);
        Gate::define('newCategory-delete', [New_CategoryPolicy::class, 'delete']);
    }
    // Gate define news
    public function newsDefine (){
        Gate::define('news-list', [NewsPolicy::class, 'view']);
        Gate::define('news-add', [NewsPolicy::class, 'create']);
        Gate::define('news-edit', [NewsPolicy::class, 'update']);
        Gate::define('news-delete', [NewsPolicy::class, 'delete']);
    }
    // Gate define feedback
    public function feedBackDefine (){
        Gate::define('feedBack-list', [FeedBackPolicy::class, 'view']);
        Gate::define('feedBack-add', [FeedBackPolicy::class, 'create']);
        Gate::define('feedBack-edit', [FeedBackPolicy::class, 'update']);
        Gate::define('feedBack-delete', [FeedBackPolicy::class, 'delete']);
    }
}
