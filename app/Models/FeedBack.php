<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class FeedBack extends Model
{
    use HasFactory, Sortable;
    protected $table = 'feedbacks';
    protected $fillable = ['customer_name', 'customer_email', 'customer_avatar', 'content', 'is_active'];
    public $sortable = ['id', 'customer_name', 'customer_email'];
}
