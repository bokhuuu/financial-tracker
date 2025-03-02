<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IncomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app');
});

Route::resource('categories', CategoryController::class)
    ->only(['index', 'show']);

Route::resource('incomes', IncomeController::class)
    ->except(['show']);
