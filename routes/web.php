<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [
    HomeController::class, 'index'
])->name('home');


Route::resource('tests', App\Http\Controllers\TestController::class);

Route::resource('merchantOrders', App\Http\Controllers\MerchantOrderController::class);
Route::view('merchant-order/success','merchant_orders.success')->name('merchant-order-success');
Route::view('merchant-order/notify','merchant_orders.notify')->name('merchant-order-notify');
Route::view('merchant-order/cancel','merchant_orders.cancel')->name('merchant-order-cancel');
Route::resource('merchantOrderResults', App\Http\Controllers\MerchantOrderResultController::class);
