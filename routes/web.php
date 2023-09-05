<?php

use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WEB\AuthController;
use App\Http\Controllers\WEB\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('home');
})->middleware(['auth:web']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('auth')->middleware(['auth'])->group(
    function () {
        Route::get('/profile', [AuthController::class, 'profile'])->name('profile_user');
        Route::post('/change-password', [AuthController::class, 'reset_password'])->name('reset_password');
    }
);
Route::prefix('users')->middleware(['auth'])->group(
    function () {
        Route::get('/', [UserController::class, 'index'])->name('page_user');
        Route::get('{user}/detail', [UserController::class, 'show'])->name('detail_view_user');
        Route::get('/store', [UserController::class, 'store_user'])->name('store_user');
        Route::get('{user}/update', [UserController::class, 'update_view_user'])->name('update_view_user');
        Route::get('update/{user}', [UserController::class, 'update'])->name('update_user');
    }
);
