<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ManualNoteController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ServiceController;
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

Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('/upload', function () {
    return view ('welcome');
});



Route::resource('customers', CustomerController::class)->except(['index']);
Route::get('customers', [CustomerController::class, 'index'])->name('customers.index');
Route::post('uploadfile', [UploadController::class, 'excelupload'])->name('file.upload');

//auth routes
// Authentication Routes
Route::get('/login', [AuthController::class, 'login_index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'register_index'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/', [AuthController::class, 'logout'])->name('logout');


//user route
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'home'])->name('home');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/account-save', [AccountController::class, 'store'])->name('account.store');
    Route::post('/search', [AccountController::class, 'search'])->name('account.search');
    Route::get('/search', [AccountController::class, 'search'])->name('account.search');
    Route::get('/account',[AccountController::class, 'account_index'])->name('account.newaccount');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/notestore', [ManualNoteController::class, 'store'])->name('note.store');
    Route::get('/notes', [ManualNoteController::class, 'index'])->name('note.index');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/packages', [PackageController::class, 'getPackages']);
    Route::get('/package-option', [PackageController::class, 'getPackageOption']);
    Route::post('/save-account-service', [PackageController::class, 'storeAccountService']);
});

//service route
Route::middleware(['auth'])->group(function () {
    Route::get('/service',[ServiceController::class, 'service_index'])->name('service_newservice');
});