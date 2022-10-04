<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Schedule extends Model
{
    use HasFactory, Sortable;

    protected $fillable = [
        'fullname',
        'birthday',
        'gender',
        'phone',
        'email',
        'address',
        'cmnd',
        'content',
        'date',
        'status'

    ];
    public $sortable = [
        'id',
        'fullname',
        'birthday',
        'gender',
        'phone',
        'email',
        'address',
        'cmnd',
        'content',
        'date'
    ];


    public function schedule_services () {
        return $this->belongsToMany(Schedule::class, 'schedule_services', 'schedule_id', 'service_id');
    }
}
