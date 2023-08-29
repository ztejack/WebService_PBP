<?php

use App\Http\Controllers\HomeController;
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
        Route::get('/profile', [UserController::class, 'profile'])->name('profile_user');
    }
);
Route::prefix('users')->middleware(['auth'])->group(
    function () {
        Route::get('/', [UserController::class, 'index'])->name('page_user');
        Route::get('/show', [UserController::class, 'show'])->name('show_user');
        Route::get('/store', [UserController::class, 'stor_user'])->name('store_user');
    }
);
