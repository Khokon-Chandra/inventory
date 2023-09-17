<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::resource('users', UserController::class)->only('index', 'store', 'create');

    Route::controller(TransactionController::class)->name('transactions.')->prefix('transactions')->group(function () {

        Route::get('/', 'index')->name('index');

        Route::get('/deposit', 'deposit')->name('deposit');
        Route::get('/deposit/create', 'createDeposit')->name('deposit.create');
        Route::post('/deposit', 'storeDeposit')->name('deposit.store');


        Route::get('/withdrawal', 'withdrawal')->name('withdrawal');
        Route::get('/withdrawal/create', 'createWithdrawal')->name('withdrawal.create');
        Route::post('/withdrawal', 'storeWithdrawal')->name('withdrawal.store');
    });
});

require __DIR__ . '/auth.php';
