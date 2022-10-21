<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedBack extends Model
{
    use HasFactory;
    protected $table = 'feedbacks';
    protected $fillable = ['customer_name', 'customer_email', 'customer_avatar', 'content', 'is_active'];
}
