<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;


    protected $fillable = ['store_id','product_id','opening_stock','closing_stock','date'];

    public function product()
    {
        return $this->hasMany(Product::class,'product_id','id');
    }

    
}
