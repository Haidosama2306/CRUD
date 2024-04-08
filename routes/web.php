<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Middleware\AuthenticateMiddleware;
use App\Http\Middleware\LoginMiddleware;
use App\Http\Controllers\Backend\UserController;

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

Route::get('login/admin',[AuthController::class, 'indexLogin'])->name('auth.login.admin')->middleware(LoginMiddleware::class);
Route::post('login',[AuthController::class, 'login'])->name('auth.login');
Route::get('logout',[AuthController::class, 'logout'])->name('auth.logout');

Route::get('dashboard/index',[DashboardController::class, 'index'])->name('dashboard.index')->middleware(AuthenticateMiddleware::class);

Route::get('register/admin',[AuthController::class, 'indexRegister'])->name('auth.register.admin')->middleware(LoginMiddleware::class);
Route::post('create',[AuthController::class, 'create'])->name('auth.create')->middleware(LoginMiddleware::class);

Route::group(['prefix'=>'user'], function(){
    Route::get('index',[UserController::class, 'index'])->name('user.index')->middleware(AuthenticateMiddleware::class);

    Route::get('{id}/read',[UserController::class, 'read'])->name('user.read')->where(['id'=>'[0-9]+'])->middleware(AuthenticateMiddleware::class);
    
    Route::get('{id}/edit',[UserController::class, 'edit'])->name('user.edit')->where(['id'=>'[0-9]+'])->middleware(AuthenticateMiddleware::class);
    Route::post('{id}/update',[UserController::class, 'update'])->name('user.update')->where(['id'=>'[0-9]+'])->middleware(AuthenticateMiddleware::class);

    Route::get('{id}/destroy',[UserController::class, 'destroy'])->name('user.destroy')->where(['id'=>'[0-9]+'])->middleware(AuthenticateMiddleware::class);
    Route::post('{id}/delete',[UserController::class, 'delete'])->name('user.delete')->where(['id'=>'[0-9]+'])->middleware(AuthenticateMiddleware::class);
});