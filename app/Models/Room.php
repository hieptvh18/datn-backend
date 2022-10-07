<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Room extends Model
{
    use HasFactory, Sortable;

    protected $fillable = [
        'room_name',
        'history',
        'mission',
        'achievement'
    ];

    public $sortable = [
        'id',
        'room_name',
        'history',
        'mission',
        'achievement'
    ];
}
