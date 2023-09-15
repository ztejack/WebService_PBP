<?php

use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WEB\AuthController;
use App\Http\Controllers\WEB\ExperienceController;
use App\Http\Controllers\WEB\RoleController;
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
        Route::post('/archive', [UserController::class, 'archive'])->name('archive_user');
        Route::post('/unarchive', [UserController::class, 'unarchive'])->name('unarchive_user');
        Route::post('/attemp-role', [UserController::class, 'attemp_role_user'])->name('attemp_role');
        Route::post('/attemp-permission', [UserController::class, 'attemp_permission_user'])->name('attemp_permission');
    }
);
Route::prefix('admin')->middleware(['auth'])->group(
    function () {
        route::get('/role-permission', [RoleController::class, 'index'])->name('role.permission');
        route::post('/role-permission/store', [RoleController::class, 'store'])->name('role.store');
        route::post('/role-permission/update/{role}', [RoleController::class, 'update'])->name('role.update');
    }
);
Route::prefix('users')->middleware(['auth'])->group(
    function () {
        Route::get('/', [UserController::class, 'index'])->name('page_user');
        Route::get('{user}/detail', [UserController::class, 'show'])->name('detail_view_user');
        // Route::get('/store', [UserController::class, 'store_view_user'])->name('store_view_user');
        Route::post('/store', [UserController::class, 'store'])->name('store_user');
        Route::get('{user}/update', [UserController::class, 'update_view_user'])->name('update_view_user');
        Route::put('update/{user}', [UserController::class, 'update'])->name('update_user');
        Route::post('experience/store', [ExperienceController::class, 'store'])->name('store_experience_user');
        Route::post('experience/destroy/{experience}', [ExperienceController::class, 'destroy'])->name('destroy_experience_user');
    }
);
