<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Patient extends Model
{
    use HasFactory, Sortable;

    protected $table = 'patients';

    protected $fillable = ['customer_name','phone','description','address','birthday','cmnd','status'];
    public $sortable = ['id','customer_name','phone','description','birthday','cmnd'];


}
