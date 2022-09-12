<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'role_name'
    ];

    public function permissions()
    {
        return $this->hasMany(Permission::class, 'parent_id', 'id');
    }

    public function permission_roles () {
        return $this->belongsToMany(Permission::class, 'permission_roles', 'role_id', 'permission_id');
    }

    public function delete_role_admin()
    {
        return $this->belongsToMany(Role::class, 'role_admins', 'role_id', 'admin_id');
    }
}
