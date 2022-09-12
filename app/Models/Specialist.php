<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialist extends Model
{
    use HasFactory;

<<<<<<< HEAD
    protected $table = 'specialists';

    protected $fillable = ['specialist_name', 'function', 'description'];

    // gallery image

    public function galleries()
    {
        return $this->hasMany(SpecialistGallery::class, 'specialist_id', 'id');
    }
=======
    protected $fillable = [
        'specialist_name',
        'short_desc'
    ];
>>>>>>> origin/hieunv
}
