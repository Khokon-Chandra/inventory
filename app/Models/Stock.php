<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Stock extends Model
{
    use HasFactory;


    protected $fillable = ['company_id','store_id','product_id','opening_stock','closing_stock','date'];


    public function product()
    {
        return $this->hasMany(Product::class,'product_id','id');
    }


    public static function booted()
    {
        parent::boot();

        static::addGlobalScope('company_wise_data', function (Builder $builder) {
            if(Auth::check()){
                $builder->where('company_id',Auth::user()->company_id);
            }
        });
        
    }
    
}