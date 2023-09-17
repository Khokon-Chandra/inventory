<?php

namespace App\Http\Controllers;

use App\Enums\AccountTypeEnum;
use App\Enums\TransactionTypeEnum;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index()
    {
        return view('transaction.index', [
            'transactions' => Transaction::with('user')->latest()->paginate()
        ]);
    }


    public function deposit()
    {
        return view('transaction.deposit', [
            'transactions' => Transaction::with('user')->deposit()->latest()->paginate()
        ]);
    }



    public function createDeposit()
    {
        return view('transaction.create_deposit', [
            'users' => User::select('id', 'name')->get()
        ]);
    }




    public function storeDeposit(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|numeric|min:1',
        ]);

        try {
            DB::beginTransaction();


            $user    = User::find($request->user_id);

            $fee     = $user->account_type == AccountTypeEnum::INDIVIDUAL ? 0.015 : 0.025;

            $deposit = new Transaction();

            $deposit->user_id = $user->id;
            $deposit->amount  = $request->amount;
            $deposit->transaction_type = TransactionTypeEnum::DEPOSIT;
            $deposit->fee = $request->amount * $fee;
            $deposit->date = Carbon::now()->format('Y-m-d');
            $deposit->save();

            $user->balance = $user->balance + $request->amount;
            $user->save();

            DB::commit();
            return redirect()->route('transactions.deposit')->with('success', 'successfully deposit request created');
        } catch (\Exception $error) {
            DB::rollBack();
            return back()->with('error', $error->getMessage());
        }
    }








    public function withdrawal()
    {
        return view('transaction.withdrawal', [
            'transactions' => Transaction::with('user')->withdrawal()->latest()->paginate()
        ]);
    }



    public function createWithdrawal()
    {
        return view('transaction.create_withdrawal', [
            'users' => User::select('id', 'name')->get()
        ]);
    }





    public function storeWithdrawal(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|numeric|min:1',
        ]);

        try {
            DB::beginTransaction();


            $user    = User::find($request->user_id);


            $fee =  $this->getWithdrawalFee($request->amount, $user);

            if ($user->balance < ($request->amount + $fee)) {
                throw new \Exception("Insufficient Balance", 422);
            }

            $deposit = new Transaction();

            $deposit->user_id = $user->id;
            $deposit->amount  = $request->amount;
            $deposit->transaction_type = TransactionTypeEnum::WITHDRAWAL;
            $deposit->fee = $fee;
            $deposit->date = Carbon::now()->format('Y-m-d');
            $deposit->save();

            $user->balance = $user->balance - $request->amount + $fee;
            $user->save();

            DB::commit();
            return redirect()->route('transactions.withdrawal')->with('success', 'successfully deposit request created');
        } catch (\Exception $error) {
            DB::rollBack();
            return back()->with('error', $error->getMessage());
        }
    }






    private function getWithdrawalFee($amount, $user)
    {
        $today = Carbon::today();

        $rate = $user->account_type == AccountTypeEnum::INDIVIDUAL ? 0.015 : 0.025;


        // Check if today is Friday
        if ($today->dayOfWeek == Carbon::FRIDAY) {

            return 0;
        }


        



        return $amount * $rate;
    }
}
