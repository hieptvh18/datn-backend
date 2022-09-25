<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Service extends Model
{
    use HasFactory, Sortable;

    protected $fillable = [
        'service_name',
        'price',
        'parent_id',
        'is_active'
    ];
    public $sortable = [
        'id',
        'service_name',
        'price'
    ];

    public function subService(){
        return $this->hasMany(Service::class, 'parent_id');
    }
}
