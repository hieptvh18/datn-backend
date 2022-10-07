<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    use HasFactory;

    protected $table = 'product_types';

    protected $fillable = ['name','image','description'];

    // 1-n
    public function products(){
        return $this->hasMany(Product::class,'type_id');
    }
}
