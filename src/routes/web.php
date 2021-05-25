<?php

use App\Http\Controllers\TransmissionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PoleController;
use App\Http\Controllers\RouteController;
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
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('edit-user', [AuthController::class, 'editUser'])->name('edit.user');
    Route::post('edit-user-password', [AuthController::class, 'editUserPassword'])->name('edit.user.password');
    Route::get('signout', [AuthController::class, 'signOut'])->name('signout');

    Route::get('transmissions/index', [TransmissionController::class, 'index'])->name('transmissions.index');
    Route::get('transmissions/create', [TransmissionController::class, 'create'])->middleware('roles:Administrator')->name('transmissions.create');
    Route::post('transmissions/store', [TransmissionController::class, 'store'])->middleware('roles:Administrator')->name('transmissions.store');
    Route::get('transmissions/show/{id}', [TransmissionController::class, 'show'])->name('transmissions.show');
    Route::get('transmissions/edit/{id}', [TransmissionController::class, 'edit'])->middleware('roles:Administrator')->name('transmissions.edit');
    Route::put('transmissions/update/{id}', [TransmissionController::class, 'update'])->middleware('roles:Administrator')->name('transmissions.update');
    Route::delete('transmissions/destroy/{id}', [TransmissionController::class, 'destroy'])->middleware('roles:Administrator')->name('transmissions.destroy');

    Route::get('routes/index', [RouteController::class, 'index'])->name('routes.index');
    Route::get('routes/create', [RouteController::class, 'create'])->middleware('roles:Administrator')->name('routes.create');
    Route::post('routes/store', [RouteController::class, 'store'])->middleware('roles:Administrator')->name('routes.store');
    Route::get('routes/show/{id}', [RouteController::class, 'show'])->name('routes.show');
    Route::get('routes/edit/{id}', [RouteController::class, 'edit'])->middleware('roles:Administrator')->name('routes.edit');
    Route::put('routes/update/{id}', [RouteController::class, 'update'])->middleware('roles:Administrator')->name('routes.update');
    Route::delete('routes/destroy/{id}', [RouteController::class, 'destroy'])->middleware('roles:Administrator')->name('routes.destroy');

    Route::get('poles/index', [PoleController::class, 'index'])->name('poles.index');
    Route::get('poles/create', [PoleController::class, 'create'])->middleware('roles:Administrator')->name('poles.create');
    Route::post('poles/store', [PoleController::class, 'store'])->middleware('roles:Administrator')->name('poles.store');
    Route::get('poles/show/{id}', [PoleController::class, 'show'])->name('poles.show');
    Route::get('poles/edit/{id}', [PoleController::class, 'edit'])->middleware('roles:Administrator')->name('poles.edit');
    Route::put('poles/update/{id}', [PoleController::class, 'update'])->middleware('roles:Administrator')->name('poles.update');
    Route::delete('poles/destroy/{id}', [PoleController::class, 'destroy'])->middleware('roles:Administrator')->name('poles.destroy');
});

Route::get('login', [AuthController::class, 'index'])->middleware('guest')->name('login');
Route::post('custom-login', [AuthController::class, 'customLogin'])->middleware('guest')->name('login.custom');

Route::get('register', [AuthController::class, 'registration'])->name('register.user');
Route::post('custom-registration', [AuthController::class, 'customRegistration'])->name('register.custom');







