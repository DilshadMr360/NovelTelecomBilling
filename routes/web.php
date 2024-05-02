<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AccountController;
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



Route::resource('customers', CustomerController::class)->except(['index']);
Route::get('customers', [CustomerController::class, 'index'])->name('customers.index');
Route::post('uploadfile', [UploadController::class, 'uploadfile'])->name('file.upload');

//auth routes
Route::get('/login',[AuthController::class,'login_index'])->name('login');
Route::get('/register',[AuthController::class,'register_index'])->name('register');


//user route
Route::get('/home',[HomeController::class,'home'])->name('home');

//account route
Route::get('/account',[AccountController::class, 'account_index'])->name('account.newaccount');


