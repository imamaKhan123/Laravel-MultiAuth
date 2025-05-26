<?php
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=> 'account'], function () {

    Route::group(['middleware' => 'guest'],function(){
        Route::get('login', [LoginController::class, 'index'])->name('account.login');
        Route::post('authenticate', [LoginController::class, 'authenticate'])->name('account.authenticate');
        Route::get('register', [LoginController::class, 'register'])->name('account.register');
        Route::post('process-register', [LoginController::class, 'ProcessRegister'])->name('account.ProcessRegister');

    });
    Route::group(['middleware' => 'auth'],function(){
        Route::get('dashboard', [LoginController::class, 'dashboard'])->name('account.dashboard');
        Route::get('logout', [LoginController::class, 'logout'])->name('account.logout');

    });
    
    
});
Route::get('admin/login', [AdminLoginController::class, 'index'])->name('admin.login');
        