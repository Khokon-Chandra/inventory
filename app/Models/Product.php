<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'category_id',
        'name',
        'description',
        'size',
        'unit',
        'price',
        'created_by',
    ];


    public function company()
    {
        return $this->belongsTo(Company::class);
    }


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
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