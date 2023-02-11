<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth;
use App\Http\Controllers\Admin;
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

Route::get('login', [Auth\AuthController::class, 'showLogin'])->name('login');
Route::post('login', [Auth\AuthController::class, 'login'])->name('login');
Route::get('logout', [Auth\AuthController::class, 'logout'])->name('logout');

// email verification
Route::get('email-verify/user/{id}',[Auth\AuthController::class,'showEmailVerification'])->name('verifyEmailForm');
Route::get('verify-email/user/{id}/{token}',[Auth\AuthController::class,'emailVerify'])->name('verifyEmail');
Route::post('email-resent/user/{id}',[Auth\AuthController::class,'resentEmail'])->name('resentEmail');

// forgot password
Route::get('forgot-passsword',[Auth\AuthController::class,'showRecoveryForm'])->name('recoveryForm');
Route::post('forgot-passsword',[Auth\AuthController::class,'recoveryPassword'])->name('recoveryPassword');
Route::get('forgot-reset/{id}/{token}',[Auth\AuthController::class,'showPasswordResetForm'])->name('passwordResetForm');
Route::post('forgot-reset/{id}',[Auth\AuthController::class,'passwordReset'])->name('passwordReset');

Route::get('register', [Auth\AuthController::class, 'showRegister'])->name('register');
Route::post('register', [Auth\AuthController::class, 'register'])->name('register');
Route::post('register/confirm', [Auth\AuthController::class, 'registerConfirm'])->name('registerConfirm');

// Route Authentication for Manager
Route::group(['middleware' => ['isManager', 'auth']], function () {
    Route::get('manager/dashboard', [Admin\DashboardController::class, 'managerIndex']);
    Route::get('/', [Admin\DashboardController::class, 'managerIndex']);
    Route::get('home', [Admin\DashboardController::class, 'managerIndex']);


    Route::get('profile/list', [Admin\ProfileController::class, 'index']);
    Route::get('profile/add', [Admin\ProfileController::class, 'showProfile']);
    Route::post('profile/add', [Admin\ProfileController::class, 'profileValidation'])->name('profileValidation');
    Route::post('profile/confirm', [Admin\ProfileController::class, 'profileSave'])->name('profileSave');
    Route::get('profile/edit/{id}', [Admin\ProfileController::class, 'edit']);
    Route::post('profile/update/{id}', [Admin\ProfileController::class, 'editValidate'])->name('editValidate');
});

// Route Authentication for Staff
Route::group(['middleware' => ['isStaff', 'auth']], function () {
    Route::get('staff/dashboard', [Admin\DashboardController::class, 'index']);
    Route::get('/', [Admin\DashboardController::class, 'index']);
    Route::get('home', [Admin\DashboardController::class, 'index']);
});

// Route Authentication for Both Manager & Staff
Route::group(['middleware' => ['auth']], function () {
    // スタッフ情報
    Route::get('staff/list', [Admin\StaffInfo::class, 'index']);
    Route::get('staff/add', [Admin\StaffInfo::class, 'showCreate']);
    Route::post('staff/add', [Admin\StaffInfo::class, 'storeStaffData'])->name('createStaff');
    Route::post('staff/confirm', [Admin\StaffInfo::class, 'confirm'])->name('confirmStaff');
});
