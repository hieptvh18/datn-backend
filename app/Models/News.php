<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = ['title', 'news_category', 'content', 'author_id', 'tags'];

    public function imageNews () {
        return $this->hasMany(NewsImage::class, 'news_id', 'id');
    }

    // public function news_images () {

    //     return $this->belongsToMany(NewsImage::class);
    // }

    public function news_newCategory () {
        return $this->belongsTo(NewCategory::class, 'news_category', 'id');
    }

    public function news_author () {
        return $this->belongsTo(Admin::class, 'author_id', 'id');
    }

}
