<?php

namespace App\Enums;

enum TransactionTypeEnum: string
{
    case DEPOSIT = 'diposit';
    case WITHDRAWAL   = 'withdrawal';
}
