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

Route::get('register', [Auth\AuthController::class, 'showRegister'])->name('register');
Route::post('register', [Auth\AuthController::class, 'register'])->name('register');
Route::post('register/confirm', [Auth\AuthController::class, 'registerConfirm'])->name('registerConfirm');

// Route Authentication for Manager
Route::group(['middleware' => ['isManager', 'auth']], function () {
    Route::get('manager/dashboard', [Admin\DashboardController::class, 'managerIndex']);
    Route::get('/', [Admin\DashboardController::class, 'managerIndex']);
    Route::get('home', [Admin\DashboardController::class, 'managerIndex']);

    // プロフィール
    Route::get('profile/list', [Admin\ProfileController::class, 'index']);
    Route::get('profile/add', [Admin\ProfileController::class, 'showProfile']);
    Route::post('profile/add', [Admin\ProfileController::class, 'profileValidation'])->name('profileValidation');
    Route::post('profile/confirm', [Admin\ProfileController::class, 'profileSave'])->name('profileSave');
    Route::get('profile/edit/{id}', [Admin\ProfileController::class, 'edit']);
    Route::get('profile/changepassword', [Admin\ProfileController::class, 'changePassword']);
    Route::post('profile/changepassword', [Admin\ProfileController::class, 'changePasswordPost'])->name('changepassword');
    Route::post('profile/update/{id}', [Admin\ProfileController::class, 'editValidate'])->name('editValidate');
    Route::get('profile/delete/{id}', [Admin\ProfileController::class, 'delete']);
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
