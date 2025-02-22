<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\CutiController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\admin\EmployeeController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;

Route::get('/', function () {
    return redirect()->route('register.index');
});

Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/register', [RegisterController::class, 'register'])->name('register.store');
Route::any('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'prosLogin'])->name('login.process');

Route::middleware('guest')->group(function () {
    Route::get('/forgot-password', [ForgotPasswordController::class, 'password'])->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'forgotPassword'])->name('password.email');

    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'resetPassword'])->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'resetPasswordForm'])->name('password.update');
});

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/master-employee', [EmployeeController::class, 'index'])->name('master-employee');
    Route::get('/master-employee/create', [EmployeeController::class, 'create'])->name('master-employee.create');
    Route::post('/master-employee/store', [EmployeeController::class, 'add_master'])->name('master-employee.store');
    Route::get('/master-employee/edit/{id}', [EmployeeController::class, 'edit'])->name('master-employee.edit');
    Route::put('/master-employee/update/{id}', [EmployeeController::class, 'update_master'])->name('master-employee.update');
    Route::delete('/master-employee/{id}', [EmployeeController::class, 'delete_master'])->name('delete-master-employee');

    // cuti
    Route::get('/cuti-employee', [CutiController::class, 'index'])->name('cuti_employee.index');
    Route::get('/cuti/create', [CutiController::class, 'create'])->name('cuti.create');
    Route::post('/cuti/store', [CutiController::class, 'store'])->name('cuti_employee.store');
    Route::post('/cuti/select-employee', [CutiController::class, 'select_cuti_employee'])->name('cuti.select_employee');
    Route::get('/cuti-employee/edit/{id}', [CutiController::class, 'edit'])->name('cuti-employee.edit');
    Route::put('/cuti_employee/{id}', [CutiController::class, 'update'])->name('cuti_employee.update');
    Route::delete('/cuti_employee/{id}', [CutiController::class, 'delete_cuti_employee'])->name('cuti_employee.delete');
});
