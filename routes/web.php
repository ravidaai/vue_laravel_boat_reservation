<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/payment_process', [FrontendController::class, 'paymentProcess'])->name('make.payment_process')->middleware('signed');

Route::post('/payment', [FrontendController::class, 'payment'])->name('make.payment');
Route::post('/payment_success', [FrontendController::class, 'paymentSuccess'])->name('make.payment_success');
