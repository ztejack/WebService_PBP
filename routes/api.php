<?php

use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\Auth\CodeCheckController;
use App\Http\Controllers\API\Auth\ForgotPasswordController;
use App\Http\Controllers\API\Auth\ResetPasswordController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1/auth')->group(
    function () {
        Route::post('login', [AuthController::class, 'login']);
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('refresh', [AuthController::class, 'refresh']);
        Route::post('changePassword', [AuthController::class, 'ChangePassword']);

        Route::post('password/email',  ForgotPasswordController::class);
        Route::post('password/code/check', CodeCheckController::class);
        Route::post('password/reset', ResetPasswordController::class);
    }
);

Route::prefix('v1/user')->middleware(['auth:api'])->group(
    function () {
        Route::get('getall', [UserController::class, 'index'])->middleware('can:getall-users');
        Route::get('search', [UserController::class, 'search'])->middleware('can:search-users');
        Route::post('store', [UserController::class, 'store'])->middleware('can:store-users');
        Route::get('show/{user}', [UserController::class, 'show'])->middleware('can:show-users');
        Route::patch('update/{user}', [UserController::class, 'update'])->middleware('can:update-users');
        Route::post('destroy/{user}', [UserController::class, 'destroy'])->middleware('can:delete-users');
    }
);
