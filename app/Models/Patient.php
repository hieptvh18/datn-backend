<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Patient extends Model
{
    use HasFactory, Sortable;

    protected $table = 'patients';

    protected $fillable = ['customer_name','phone','description','address','birthday','schedule_id', 'date', 'status', 'order_id', 'token_url'];
    public $sortable = ['id','customer_name','phone','description','birthday'];

    public function patient_services () {
        return $this->belongsToMany(Patient::class, 'patient_services', 'patient_id', 'service_id');
    }
    public function service_patients () {
        return $this->belongsToMany(Service::class, 'patient_services', 'patient_id', 'service_id');
    }
    public function patient_doctors () {
        return $this->belongsToMany(Admin::class, 'patient_doctors', 'patient_id', 'doctor_id');
    }
    public function patient_products () {
        return $this->belongsToMany(Product::class, 'patient_products', 'patient_id', 'product_id')->withPivot('product_id', 'patient_id');
    }


    public function getHdsdProduct (){
        return $this->hasMany(Order::class, 'patient_id', 'id');
    }
}
