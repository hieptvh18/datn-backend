<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    // protected $table = 'orders';
    protected $fillable = [
        'customer_name',
        'customer_phone',
        'service_id',
        'payment_method',
        'description'
    ];
    public function order_details (){
        return $this->belongsToMany(Order::class, 'order_details', 'order_id');
    }
}
