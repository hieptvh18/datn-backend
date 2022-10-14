<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewCategory extends Model
{
    use HasFactory;
    protected $table = 'news_categories';

    protected $fillable = ['category_name', 'category_image', 'description'];
}
