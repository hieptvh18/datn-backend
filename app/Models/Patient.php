<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Patient extends Model
{
    use HasFactory, Sortable;

    protected $table = 'patients';

    protected $fillable = ['customer_name','phone','description','address','birthday','cmnd','schedule_id', 'service_id', 'status'];
    public $sortable = ['id','customer_name','phone','description','birthday','cmnd'];

    public function patient_services () {
        return $this->belongsToMany(Patient::class, 'patient_services', 'patient_id', 'service_id');
    }
    public function service_patients () {
        return $this->belongsToMany(Service::class, 'patient_services', 'patient_id', 'service_id');
    }
}
