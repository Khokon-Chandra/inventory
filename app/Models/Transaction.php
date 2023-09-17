<?php

namespace App\Models;

use App\Enums\TransactionTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'transaction_type', 'amount', 'fee', 'date'];

    protected $casts = [
        'transaction_type' => TransactionTypeEnum::class
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function scopeDeposit($query)
    {
        $query->where('transaction_type', TransactionTypeEnum::DEPOSIT);
    }

    public function scopeWithdrawal($query)
    {
        $query->where('transaction_type', TransactionTypeEnum::WITHDRAWAL);
    }
}
