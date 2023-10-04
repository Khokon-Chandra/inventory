<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use HasFactory;

    protected $fillable = [
        'from_store',
        'to_store',
        'quantity',
        'created_by',
    ];

    public function fromStore()
    {
        return $this->belongsTo(Store::class,'form_store','id');
    }

    public function toStore()
    {
        return $this->belongsTo(Store::class,'to_store','id');
    }

    
}