<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth;
use App\Http\Controllers\Admin;
use App\Mail\WelcomeMail;

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
Route::get('email-verify/user/{id}', [Auth\AuthController::class, 'showEmailVerification'])->name('verifyEmailForm');
Route::get('verify-email/user/{id}/{token}', [Auth\AuthController::class, 'emailVerify'])->name('verifyEmail');
Route::post('email-resent/user/{id}', [Auth\AuthController::class, 'resentEmail'])->name('resentEmail');

// forgot password
Route::get('forgot-passsword', [Auth\AuthController::class, 'showRecoveryForm'])->name('recoveryForm');
Route::post('forgot-passsword', [Auth\AuthController::class, 'recoveryPassword'])->name('recoveryPassword');
Route::get('forgot-reset/{id}/{token}', [Auth\AuthController::class, 'showPasswordResetForm'])->name('passwordResetForm');
Route::post('forgot-reset/{id}', [Auth\AuthController::class, 'passwordReset'])->name('passwordReset');

Route::get('register', [Auth\AuthController::class, 'showRegister'])->name('register');
Route::post('register', [Auth\AuthController::class, 'register'])->name('register');
Route::post('register/confirm', [Auth\AuthController::class, 'registerConfirm'])->name('registerConfirm');

// Route Authentication for Manager
Route::group(['middleware' => ['isManager', 'auth']], function () {
    Route::get('manager/dashboard', [Admin\DashboardController::class, 'managerIndex']);
    // Route::get('/', [Admin\DashboardController::class, 'managerIndex']);
    // Route::get('home', [Admin\DashboardController::class, 'managerIndex']);

    // プロフィール
    Route::get('profile/list', [Admin\ProfileController::class, 'index']);
    Route::get('profile/add', [Admin\ProfileController::class, 'showProfile']);
    Route::post('profile/add', [Admin\ProfileController::class, 'profileValidation'])->name('profileValidation');
    Route::post('profile/confirm', [Admin\ProfileController::class, 'profileSave'])->name('profileSave');
    Route::get('profile/edit/{id}', [Admin\ProfileController::class, 'edit']);
    Route::get('profile/changepassword', [Admin\ProfileController::class, 'changePassword']);
    Route::post('profile/changepassword', [Admin\ProfileController::class, 'changePasswordPost'])->name('changepassword');
    Route::post('profile/update/{id}', [Admin\ProfileController::class, 'editValidate'])->name('editValidateProfile');
    Route::get('profile/delete/{id}', [Admin\ProfileController::class, 'delete']);

    Route::get('maileclipse', [Admin\Maileclipse::class, 'maileclipseM']);

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
    Route::get('staff/detail/{id}', [Admin\StaffInfo::class, 'showDetail'])->name('showStaffDetail');
    Route::get('staff/edit/{id}', [Admin\StaffInfo::class, 'edit']);
    Route::post('staff/update/{id}', [Admin\StaffInfo::class, 'editValidateStaff'])->name('editValidateStaff');
    Route::get('staff/delete/{id}', [Admin\StaffInfo::class, 'delete']);
    Route::get('staff/report_batch/{id}', [Admin\StaffInfo::class, 'exportStaff']);
    Route::get('get-positions-by-department', [Admin\StaffInfo::class, 'getPositionsByDepartment']);

    //デパート
    Route::get('department', [Admin\Depart::class, 'showCreate']);
    Route::post('department', [Admin\Depart::class, 'storeData'])->name('createDepart');
    Route::get('department/edit/{id}', [Admin\Depart::class, 'edit']);
    Route::post('department/update/{id}', [Admin\Depart::class, 'editValidate'])->name('editValidateDept');
    Route::get('department/delete/{id}', [Admin\Depart::class, 'delete']);

    Route::get('position', [Admin\PositionController::class, 'showCreate']);
    Route::post('position', [Admin\PositionController::class, 'storeData'])->name('createPosition');
    Route::get('position/edit/{id}', [Admin\PositionController::class, 'edit']);
    Route::post('position/update/{id}', [Admin\PositionController::class, 'editValidate'])->name('editValidate');
    Route::get('position/delete/{id}', [Admin\PositionController::class, 'delete']);

    // Route::get('timecard', [Admin\PositionController::class, 'showCreate']);
});
