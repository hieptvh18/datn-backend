<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = ['title', 'news_category', 'content', 'author_id', 'tags'];

    public function news_images () {
        return $this->hasMany(NewsImage::class, 'news_id', 'id');
    }


    // public function news_author () {
    //     return $this->b(NewsImage::class, 'news_id', 'id');
    // }

}
