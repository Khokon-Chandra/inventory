<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Transfer extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'from_store',
        'to_store',
        'created_by',
    ];

    public function fromStore()
    {
        return $this->belongsTo(Store::class,'from_store','id');
    }

    public function toStore()
    {
        return $this->belongsTo(Store::class,'to_store','id');
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