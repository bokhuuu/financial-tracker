<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout');
});

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



Route::resource('categories', CategoryController::class)
    ->only(['index', 'show']);


Route::resource('incomes', IncomeController::class)
    ->except(['show']);
