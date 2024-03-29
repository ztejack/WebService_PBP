<?php

use App\Http\Controllers\WEB\AbsensiController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\WEB\GajiSlipController;
use App\Http\Controllers\WEB\GajiParamController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\WEB\TunjanganController;
use App\Http\Controllers\WEB\AuthController;
use App\Http\Controllers\WEB\EmployeController;
use App\Http\Controllers\WEB\ExperienceController;
use App\Http\Controllers\WEB\GajiController;
use App\Http\Controllers\WEB\GajiLemburController;
use App\Http\Controllers\WEB\GajiRapelController;
use App\Http\Controllers\WEB\GajiSubmissionController;
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
        Route::post('/reset-password/{user}', [AuthController::class, 'reset_password'])->name('reset_password');
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
                Route::prefix('worklocation')->middleware(['auth'])->group(
                    function () {
                        Route::post('/store', [ParamController::class, 'worklocation_store'])->name('worklocation.store');
                        Route::post('/update/{worklocation}', [ParamController::class, 'worklocation_update'])->name('worklocation.update');
                        Route::post('/destroy/{worklocation}', [ParamController::class, 'worklocation_destroy'])->name('worklocation.destroy');
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
Route::prefix('users')->middleware(['auth'])->group(
    function () {
        Route::get('/', [UserController::class, 'index'])->name('page_user');
        Route::get('{user}/detail', [UserController::class, 'show'])->name('detail_view_user');
        // Route::get('/store', [UserController::class, 'store_view_user'])->name('store_view_user');
        Route::post('/store', [UserController::class, 'store'])->name('store_user')->middleware('can:UserManagement');
        Route::get('{user}/update', [UserController::class, 'update_view_user'])->name('update_view_user')->middleware('can:UserManagement');
        Route::put('update/{user}', [UserController::class, 'update'])->name('update_user')->middleware('can:UserManagement');

        Route::post('/activate', [UserController::class, 'activate'])->name('activate_user')->middleware('can:UserManagement');
        Route::post('/attemp-role', [UserController::class, 'attemp_role_user'])->name('attemp_role')->middleware('can:UserManagement');
        Route::post('/attemp-permission', [UserController::class, 'attemp_permission_user'])->name('attemp_permission');

        Route::post('experience/store', [ExperienceController::class, 'store'])->name('store_experience_user');
        Route::post('experience/destroy/{experience}', [ExperienceController::class, 'destroy'])->name('destroy_experience_user');
    }
);

Route::prefix('gaji')->middleware(['auth'])->group(
    function () {
        // Route::get('/self/{employe}', [GajiController::class, 'salary'])->name('salary');
        Route::get('/', [GajiController::class, 'index'])->name('page_gaji');
        Route::get('{user}/view/', [GajiController::class, 'view_gaji_employe'])->name('page_gaji_employe');

        // need ref
        Route::post('/store/gaji_employee/{gaji}', [GajiController::class, 'update_gaji_employe'])->name('update_gaji_employe')->middleware('can:GajiManagement');
        Route::prefix('slip')->middleware(['auth'])->group(
            function () {
                Route::get('detail/{slip}', [GajiSlipController::class, 'detail_slip_gaji'])->name('page_detail_slip_gaji');
                Route::get('print/{slip}', [GajiSlipController::class, 'print_slip_gaji'])->name('page_print_slip_gaji');
            }
        );


        // need ref

        Route::prefix('gaji-param')->middleware(['auth', 'can:GajiManagement'])->group(function () {
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
            Route::prefix('tunjangan_lain')->middleware(['auth'])->group(function () {
                Route::post('/store', [TunjanganController::class, 'store'])->name('param_tunjangan_lain_store');
            });
            Route::prefix('bpjs')->middleware(['auth'])->group(
                function () {
                    Route::post('/store', [GajiParamController::class, 'param_bpjs_store'])->name('param.bpjs.store');
                    Route::put('/update/{bpjs}', [GajiParamController::class, 'param_bpjs_update'])->name('param.bpjs.update');
                    Route::post('/delete/{bpjs}', [GajiParamController::class, 'param_bpjs_destroy'])->name('param.bpjs.delete');
                    Route::put('/update/status/{bpjs}', [GajiParamController::class, 'param_bpjs_update_status'])->name('param.bpjs.update.status');
                }
            );
            Route::prefix('ptkp')->middleware(['auth'])->group(
                function () {
                    Route::post('/store', [GajiParamController::class, 'param_ptkp_store'])->name('param.ptkp.store');
                    Route::put('/update/{ptkp}', [GajiParamController::class, 'param_ptkp_update'])->name('param.ptkp.update');
                    Route::post('/delete/{ptkp}', [GajiParamController::class, 'param_ptkp_destroy'])->name('param.ptkp.delete');
                }
            );
            Route::prefix('pph')->middleware(['auth'])->group(
                function () {
                    Route::put('/update/{pph}', [GajiParamController::class, 'param_pph_update'])->name('param.pph.update');
                }
            );
        });
        Route::prefix('submission')->middleware(['auth'])->group(
            function () {
                Route::get('/store', [GajiSubmissionController::class, 'view_store'])->name('submission.view_store');
                Route::post('/store', [GajiSubmissionController::class, 'store'])->name('submission.store');
                Route::post('/store_direksi', [GajiSubmissionController::class, 'store_direksi'])->name('submission.store_direksi');
                Route::get('/{submission}/update', [GajiSubmissionController::class, 'view_update'])->name('submission.view_update');
                Route::PUT('/update/{submission}', [GajiSubmissionController::class, 'update'])->name('submission.update');
                Route::post('/delete/{submission}', [GajiSubmissionController::class, 'destroy'])->name('submission.delete');
                Route::get('/detail/{submission}', [GajiSubmissionController::class, 'show'])->name('submission.show');
            }
        );
    }
);

Route::prefix('employe')->middleware(['auth'])->group(
    function () {
        Route::get('/', [EmployeController::class, 'index'])->name('page_employe');
        Route::get('detail/{employe}', [EmployeController::class, 'view_employe'])->name('employe.view');
    }
);
Route::prefix('absensi')->middleware(['auth'])->group(
    function () {
        Route::post('/store/{employe}', [AbsensiController::class, 'store'])->name('absensi.store');
        Route::put('/update/{absensi}', [AbsensiController::class, 'update'])->name('absensi.update');
        Route::post('/delete/{absensi}', [AbsensiController::class, 'destroy'])->name('absensi.delete');
    }
);
Route::prefix('lembur')->middleware(['auth'])->group(
    function () {
        Route::post('/store/{employe}', [GajiLemburController::class, 'store'])->name('lembur.store');
        Route::put('/update/{lembur}', [GajiLemburController::class, 'update'])->name('lembur.update');
        Route::post('/delete/{lembur}', [GajiLemburController::class, 'destroy'])->name('lembur.delete');
    }
);
Route::prefix('rapel')->middleware(['auth'])->group(
    function () {
        Route::post('/store/{employe}', [GajiRapelController::class, 'store'])->name('rapel.store');
        Route::post('/delete/{rapel}', [GajiRapelController::class, 'destroy'])->name('rapel.delete');
    }
);
Route::prefix('task')->middleware(['auth'])->group(
    function () {
        Route::get('/', [TaskController::class, 'index'])->name('page_task');
        Route::put('/update/{task}', [TaskController::class, 'update'])->name('task.update');
        Route::post('/delete/{task}', [TaskController::class, 'destroy'])->name('task.delete');
        Route::post('/aprove/{task}', [TaskController::class, 'aproval'])->name('task.aprov');
    }
);
