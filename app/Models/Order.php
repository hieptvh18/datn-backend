<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'customer_name',
        'customer_phone',
        'service_id',
        'product_id',
        'code_bill',
        'payment_method',
        'description',
        'total'
    ];
    public function order_details (){
        return $this->belongsToMany(Order::class, 'order_details', 'order_id');
    }
}
