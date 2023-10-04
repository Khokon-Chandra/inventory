<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;

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

    Route::resource('products', ProductController::class);

    Route::resource('categories', CategoryController::class);

    Route::resource('stores', StoreController::class);

    Route::resource('customers', StoreController::class);

    Route::resource('transfers', TransferController::class);

    Route::prefix('reports')->name('reports.')->controller(ReportController::class)->group(function(){
        Route::get('stocks','stock')->name('stock');
        Route::get('stock_in_pdf','stockPdf')->name('stock.pdf');
    });
});

require __DIR__ . '/auth.php';
