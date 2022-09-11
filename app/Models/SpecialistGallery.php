<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialistGallery extends Model
{
    use HasFactory;

    protected $table = 'specialist_gallery';

    protected $fillable = ['specialist_id','path'];

    public $timestamps = false;
}
