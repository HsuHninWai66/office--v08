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

Route::get('/home', function () {
  return redirect('dashboard');
});
Route::get('/', [Auth\AuthController::class, 'index'])->name('/');
Route::get('login', [Auth\AuthController::class, 'showLogin'])->name('login');
Route::post('login', [Auth\AuthController::class, 'login'])->name('login');
Route::get('logout', [Auth\AuthController::class, 'logout'])->name('logout');

Route::get('register', [Auth\AuthController::class, 'showRegister'])->name('register');Route::post('register', [Auth\AuthController::class, 'register'])->name('register');
Route::post('register/confirm', [Auth\AuthController::class, 'registerConfirm'])->name('registerConfirm');

Route::middleware(['auth'])->group(function () {
  Route::get('dashboard', [Admin\DashboardController::class, 'index']);
});

