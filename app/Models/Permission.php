<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $guarded = [];

    // protected $fillable = [
    //     'permission_name',
    //     'permission_key_code',
    //     'parent_id'
    // ];

    public function getParentPermission()
    {
        return $this->belongsTo(Permission::class, 'parent_id', 'id');
    }

    public function getChildrentPermission()
    {
        return $this->hasMany(Permission::class, 'parent_id', 'id');
    }
}
