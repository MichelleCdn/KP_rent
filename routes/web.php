<?php

use App\Http\Controllers\AssetCategoryController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function(){
    Route::prefix('tools')->as('tools.')->group(function () {
        Route::resource('categories', AssetCategoryController::class);
        Route::resource('categories', AssetCategoryController::class)->only(['store','update','destroy'])->middleware('admin');
    });
    //Tools
    Route::resource('tools', AssetController::class);
    Route::resource('tools', AssetController::class)->only(['store','update','destroy'])->middleware('admin');

    Route::resource('transactions', TransactionController::class);
    Route::post('transactions-filter', [TransactionController::class,'filterIndex'])->name('transactions-filter-index');

    Route::resource('transactions', TransactionController::class)->only(['store','update','destroy'])->middleware('admin');

    Route::resource('customers', CustomerController::class);
    Route::resource('customers', CustomerController::class)->only(['store','update','destroy'])->middleware('admin');

});


// Route::get('/transactions/search', 'TransactionController@search')->name('transactions.search');


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
