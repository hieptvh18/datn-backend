<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $guard = 'admin';

    protected $fillable = [
        'email',
        'fullname',
        'birthday',
        'phone',
        'address',
        'facebook_url',
        'twitter_url',
        'email_url',
        'password',
        'is_active',
        'room_id',
        'level_id',
        'specialist_id'
    ];

    public function role_admins () {
        return $this->belongsToMany(Admin::class, 'role_admins', 'admin_id', 'role_id');
    }


    public function roles () {
        return $this->belongsToMany(Role::class, 'role_admins', 'admin_id', 'role_id');
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
