<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/Login', [LoginController::class, 'index'])->name('login.index');
Route::get('/Cadastrar', [RegisterController::class, 'index'])->name('RegisterUser.index');

