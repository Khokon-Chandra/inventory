<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'company_id',
        'store_id',
        'total_price',
        'paid',
        'due',
        'created_by',
    ];




    public static function booted()
    {
        parent::boot();

        static::addGlobalScope('company_wise_data', function (Builder $builder) {
            if(Auth::check()){
                $builder->where('company_id',Auth::user()->company_id);
            }
        });
        
    }


    public function store()
    {
        return $this->belongsTo(Store::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }


    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id','id');
    }


}
