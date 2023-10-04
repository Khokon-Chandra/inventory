<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Store extends Model
{
    use HasFactory;

    protected $fillable = ['company_id','name','description'];

    public function company()
    {
        return $this->belongsTo(Company::class,'company_id','id');
    }
    

    public function users()
    {
        return $this->hasMany(User::class,'store_id','id');
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