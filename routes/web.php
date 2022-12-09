<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DoseController;
use App\Http\Controllers\UserDosesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [LoginController::class, 'login']);


Route::resource('doses', DoseController::class)->middleware('auth');
Route::resource('users', UserController::class)->middleware('auth');
Route::resource('admins', AdminController::class);

Route::controller(LoginController::class)->group(function () {
    Route::post('/logout', 'logout')->name('logout');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
});