<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Order extends Model
{
    use HasFactory, Sortable;
    protected $table = 'orders';
    protected $fillable = [
        'customer_name',
        'customer_phone',
        'service_id',
        'product_id',
        'code_bill',
        'payment_method',
        'description',
        'date',
        'total'
    ];

    public $sortable = [
        'id',
        'customer_name',
        'customer_phone',
        'date'
    ];


    public function order_details (){
        return $this->belongsToMany(Order::class, 'order_details', 'order_id');
    }
}
