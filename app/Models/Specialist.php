<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Specialist extends Model
{
    use HasFactory, Sortable;


    protected $table = 'specialists';

    protected $fillable = ['specialist_name', 'function', 'description'];


    public $sortable = [
        'id',
        'specialist_name',
        'function'
    ];

    // gallery image

    public function galleries()
    {
        return $this->hasMany(SpecialistGallery::class, 'specialist_id', 'id');
    }
}
