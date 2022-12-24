<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Admin extends Authenticatable
{
    use HasFactory, Sortable;

    protected $guard = 'admin';

    protected $fillable = [
        'email',
        'fullname',
        'birthday',
        'phone',
        'address',
        'facebook_url',
        'twitter_url',
        'password',
        'is_active',
        'room_id',
        'level_id',
        'description',
        'specialist_id'
    ];

    protected $sortable = [
        'id',
        'email',
        'fullname',
        'phone',
    ];

    public function role_admins () {
        return $this->belongsToMany(Admin::class, 'role_admins', 'admin_id', 'role_id');
    }


    public function roles () {
        return $this->belongsToMany(Role::class, 'role_admins', 'admin_id', 'role_id');
    }

    public function AdminLevel () {
        return $this->belongsTo(Level::class, 'level_id', 'id');
    }

    public function AdminSpecialist () {
        return $this->belongsTo(Specialist::class, 'specialist_id', 'id');
    }

    public function AdminRoom () {
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }

    public function checkPermission ($permissionCheck) {
        $roles = auth('admin')->user()->roles;
        foreach($roles as $role){
            $permissions = $role->permission_roles;
            if($permissions->contains('permission_key_code', $permissionCheck)){
                return true;
            }
        }
        return false;
    }
}
