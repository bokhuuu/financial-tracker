<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExpenseController;
use Illuminate\Support\Facades\Route;


Route::redirect('/', '/dashboard');

Route::get('/register', [RegistrationController::class, 'registrationForm'])
    ->name('register.form');
Route::post('/register', [RegistrationController::class, 'registerUser'])
    ->name('register.user');


Route::get('/login', [LoginController::class, 'loginForm'])
    ->name('login.form');
Route::post('/login', [LoginController::class, 'loginUser'])
    ->name('login.user');


Route::post('/logout', [LoginController::class, 'logoutUser'])
    ->name('logout.user')
    ->middleware('auth');


Route::get('dashboard', DashboardController::class)
    ->name('dashboard');


Route::resource('incomes', IncomeController::class)
    ->except(['edit', 'show']);


Route::resource('expenses', ExpenseController::class)
    ->except(['edit', 'show']);


Route::fallback(function () {
    return redirect('/');
});
