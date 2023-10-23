<?php

use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\WEB\GajiParamController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WEB\TunjanganController;
use App\Http\Controllers\WEB\AuthController;
use App\Http\Controllers\WEB\ExperienceController;
use App\Http\Controllers\WEB\GajiController;
use App\Http\Controllers\WEB\ParamController;
use App\Http\Controllers\WEB\RoleController;
use App\Http\Controllers\WEB\UserController;
use Faker\Guesser\Name;
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
        Route::prefix('profile')->middleware(['auth'])->group(
            function () {
                Route::get('/', [AuthController::class, 'profile'])->name('profile_user');
                Route::get('update', [AuthController::class, 'update_view_profile'])->name('update_view_profile');
                Route::put('update', [AuthController::class, 'update_profile'])->name('update_profile');
                Route::post('change_password', [AuthController::class, 'change_password'])->name('change_password');
            }
        );
        Route::post('/reset-password', [AuthController::class, 'reset_password'])->name('reset_password');
    }
);
Route::prefix('admin')->middleware(['auth'])->group(
    function () {
        Route::prefix('employe_param')->middleware(['auth'])->group(
            function () {
                Route::get('/', [ParamController::class, 'employe_param_view'])->name('page_employe_param');
                Route::prefix('satker')->middleware(['auth', 'can:SatkerManagement'])->group(
                    function () {
                        Route::post('/store', [ParamController::class, 'satker_store'])->name('satker.store');
                        Route::post('/update/{satker}', [ParamController::class, 'satker_update'])->name('satker.update');
                        Route::post('/destroy/{satker}', [ParamController::class, 'satker_destroy'])->name('satker.destroy');
                    }
                );
                Route::prefix('position')->middleware(['auth', 'can:PositionManagement'])->group(
                    function () {
                        Route::post('/store', [ParamController::class, 'position_store'])->name('position.store');
                        Route::post('/update/{position}', [ParamController::class, 'position_update'])->name('position.update');
                        Route::post('/destroy/{position}', [ParamController::class, 'position_destroy'])->name('position.destroy');
                    }
                );
                Route::prefix('contract')->middleware(['auth', 'can:ContractManagement'])->group(
                    function () {
                        Route::post('/store', [ParamController::class, 'contract_store'])->name('contract.store');
                        Route::post('/update/{contract}', [ParamController::class, 'contract_update'])->name('contract.update');
                        Route::post('/destroy/{contract}', [ParamController::class, 'contract_destroy'])->name('contract.destroy');
                    }
                );
                Route::prefix('golongan')->middleware(['auth', 'can:GolonganManagement'])->group(
                    function () {
                        Route::post('/store', [ParamController::class, 'golongan_store'])->name('golongan.store');
                        Route::post('/update/{golongan}', [ParamController::class, 'golongan_update'])->name('golongan.update');
                        Route::post('/destroy/{golongan}', [ParamController::class, 'golongan_destroy'])->name('golongan.destroy');
                    }
                );
            }
        );
        Route::prefix('gaji_param')->middleware(['auth'])->group(
            function () {
            }
        );
        // Route::prefix('position')->middleware(['auth'])->group(
        //     function () {
        //         Route::get('/', [ParamController::class, 'position_view'])->name('page_position');
        //     }
        // );
        // Route::prefix('contract')->middleware(['auth'])->group(
        //     function () {
        //         Route::get('/', [ParamController::class, 'contract_view'])->name('page_contract');
        //     }
        // );
        Route::prefix('role-permission')->middleware(['auth', 'can:RoleManagement'])->group(
            function () {
                Route::get('/', [RoleController::class, 'index'])->name('role.permission');
                Route::post('/store', [RoleController::class, 'store'])->name('role.store');
                Route::post('/update/{role}', [RoleController::class, 'update'])->name('role.update');
                Route::post('/destroy/{role}', [RoleController::class, 'destroy'])->name('role.destroy');
                Route::post('/attemp/{role}', [RoleController::class, 'attempt_permission'])->name('role.attempt_permission');
            }
        );
    }
);
Route::prefix('users')->middleware(['auth', 'can:UserManagement'])->group(
    function () {
        Route::get('/', [UserController::class, 'index'])->name('page_user');
        Route::get('{user}/detail', [UserController::class, 'show'])->name('detail_view_user');
        // Route::get('/store', [UserController::class, 'store_view_user'])->name('store_view_user');
        Route::post('/store', [UserController::class, 'store'])->name('store_user');
        Route::get('{user}/update', [UserController::class, 'update_view_user'])->name('update_view_user');
        Route::put('update/{user}', [UserController::class, 'update'])->name('update_user');

        Route::post('/archive', [UserController::class, 'archive'])->name('archive_user');
        Route::post('/unarchive', [UserController::class, 'unarchive'])->name('unarchive_user');
        Route::post('/attemp-role', [UserController::class, 'attemp_role_user'])->name('attemp_role');
        Route::post('/attemp-permission', [UserController::class, 'attemp_permission_user'])->name('attemp_permission');

        Route::post('experience/store', [ExperienceController::class, 'store'])->name('store_experience_user');
        Route::post('experience/destroy/{experience}', [ExperienceController::class, 'destroy'])->name('destroy_experience_user');
    }
);

Route::prefix('gaji')->middleware(['auth'])->group(
    function () {
        Route::get('/', [GajiController::class, 'index'])->name('page_gaji');
        Route::get('{user}/view/', [GajiController::class, 'view_gaji_employe'])->name('page_gaji_employe');

        // need ref
        Route::post('/store/gaji_employee', [GajiController::class, 'store_gaji_employee'])->name('store_gaji_employee');


        Route::get('/slip/detail/', [GajiController::class, 'detail_slip_gaji'])->name('page_detail_slip_gaji');
        Route::get('/slip/print/', [GajiController::class, 'print_slip_gaji'])->name('page_print_slip_gaji');
        // need ref

        Route::prefix('gaji-param')->middleware(['auth'])->group(function () {
            Route::get('/', [GajiParamController::class, 'index'])->name('page_gaji.param');
            Route::post('/store', [GajiParamController::class, 'store'])->name('gaji_param.store');
            Route::put('/update/{gajiparam}', [GajiParamController::class, 'update'])->name('gaji_param.update');
            Route::post('/delete/{gajiparam}', [GajiParamController::class, 'destroy'])->name('gaji_param.delete');
            Route::prefix('tunjangan')->middleware(['auth'])->group(
                function () {
                    Route::post('/store', [GajiParamController::class, 'param_tunjangan_store'])->name('param.tunjangan.store');
                    Route::put('/update/{tunjangan}', [GajiParamController::class, 'param_tunjangan_update'])->name('param.tunjangan.update');
                    Route::post('/delete/{tunjangan}', [GajiParamController::class, 'param_tunjangan_destroy'])->name('param.tunjangan.delete');
                }
            );
        });
        Route::prefix('tunjangan')->middleware(['auth'])->group(
            function () {
                Route::post('/store/{gaji}', [TunjanganController::class, 'store'])->name('tunjangan.store');
            }
        );
    }
);
