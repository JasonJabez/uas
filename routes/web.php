<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionDetailController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\ImageController;
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

Route::get('/', [HotelController::class, 'dashboardRoom']);



Route::resource('hotels', HotelController::class);
Route::resource('products', ProductController::class);
Route::resource('facilities', FacilityController::class);
Route::resource('users', UserController::class);
Route::resource('transactions', TransactionController::class);
Route::resource('transaction_details', TransactionDetailController::class);
Route::resource('memberships', MembershipController::class);
Route::resource('images', ImageController::class);
