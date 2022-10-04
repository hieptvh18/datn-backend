<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = ['type_id','name','price','image','description'];

    public function types(){
        return $this->belongsTo(ProductType::class,'type_id');
    }
}
