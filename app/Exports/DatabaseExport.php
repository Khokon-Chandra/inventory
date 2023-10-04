<?php

namespace App\Exports;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Transfer;
use App\Models\TransferItem;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\Exportable;


class DatabaseExport implements WithMultipleSheets
{
    use Exportable;

    protected $year;
    
    public function __construct(int $year)
    {
        $this->year = $year;
    }

    /**
     * @return array
     */
    public function sheets(): array
    {
        $sheets = [];

        $sheets[] = User::where('company_id',Auth::user()->company_id);
        $sheets[] = Order::where('company_id',Auth::user()->company_id);
        $sheets[] = OrderItem::whereIn('order_id',Order::where('company_id',Auth::user()->company_id)->pluck('id')->toArray());
        $sheets[] = Transfer::where('company_id',Auth::user()->company_id);
        return $sheets;
    }
}
