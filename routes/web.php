<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\WAController;
use App\Http\Controllers\PegawaiController;
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


//landing page
Route::get('/', [LandingPageController::class, 'index'])->name('landing-page.index');

//auth routes
Route::get('login', [AuthController::class, 'indexLogin'])->name('login');
Route::post('login-validate', [AuthController::class, 'loginValidate'])->name('login-validate');
Route::get('reganewadm', [AuthController::class, 'indexRegister'])->name('regnewadm'); // url register admin
Route::post('regis-admnew', [AuthController::class, 'storeRegister'])->name('regsnewadm');

Route::get('forgot-password', function () {
    return view('auth.forgot-password');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('login-validate');

    Route::resource('dashboard', DashboardController::class);
    Route::post('wa/send', [DashboardController::class, 'sendMessage'])->name('wa.send');

    Route::group(['prefix' => 'manajemen-admin'], function () {
        Route::get('/', [AdminController::class, 'index'])->name('manajemen-admin.list-admin');
        Route::post('/submit-admin', [AdminController::class, 'store'])->name('manajemen-admin.store');
        Route::get('/detail-json', [AdminController::class, 'detailJson'])->name('manajemen-admin.detail-json');
        Route::post('/update-admin/{id}', [AdminController::class, 'update'])->name('manajemen-admin.update');
        Route::get('/delete-admin/{id}', [AdminController::class, 'destroy'])->name('manajemen-admin.destroy');
    });

    Route::group(['prefix' => 'manajemen-pegawai'], function () {
        Route::get('/', [PegawaiController::class, 'index'])->name('manajemen-pegawai.list-pegawai');
        Route::get('/show-pegawai/{id}', [PegawaiController::class, 'show'])->name('manajemen-pegawai.show');
        Route::post('/submit-pegawai', [PegawaiController::class, 'store'])->name('manajemen-pegawai.store');
        Route::get('/detail-json', [PegawaiController::class, 'detailJson'])->name('manajemen-pegawai.detail-json');
        Route::post('/update-pegawai/{id}', [PegawaiController::class, 'update'])->name('manajemen-pegawai.update');
        Route::get('/delete-pegawai/{id}', [PegawaiController::class, 'destroy'])->name('manajemen-pegawai.destroy');
        Route::get('/history-sk/{id}', [PegawaiController::class, 'indexHistorySK'])->name('manajemen-pegawai.history-sk');
    });

    Route::post('/pegawai/import', [PegawaiController::class, 'import'])->name('manajemen-pegawai.import');
    Route::get('/pegawai/export_excel', [PegawaiController::class, 'export'])->name('manajemen-pegawai.export');
    Route::get('/notification/read-all', [PegawaiController::class, 'readAllNotif'])->name('notification.read-all');
    Route::get('/notification/load-all', [PegawaiController::class, 'loadNotif'])->name('notification.load-all');

});


Route::get('gnrtdevlopr', [AuthController::class, 'xysgnrtsa'])->name('gnrtsa'); // to generate developer account

Route::post('reset-password-email', [AuthController::class, 'sendEmailResetPassword'])->name('reset-pass-email');
Route::get('reset-password-index/{token}', [AuthController::class, 'indexResetPass'])->name('reset-pass-index');
Route::post('reset-password-submit/{token}', [AuthController::class, 'saveResetPassword'])->name('reset-pass-submit');