<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SpaceProjectController;
use App\Http\Middleware\checkAuth;
use App\Models\SpaceProject;
use Illuminate\Support\Facades\Route;

//Login
Route::prefix('Login')->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('login.index');
    Route::post('/Enter', [LoginController::class, 'loginEnter'])->name('login.enter');
});

//Cadastro
Route::prefix('Register')->group(function () {
    Route::get('/', [RegisterController::class, 'index'])->name('RegisterUser.index');
    Route::post('/Save', [RegisterController::class, 'save'])->name('RegisterUser.save');
});

Route::middleware([checkAuth::class])->group(function () { //Autenticação de Login

    Route::prefix('Logout')->group(function () {
        Route::post('/', [LoginController::class, 'logout'])->name('logout');
    });
    
    Route::prefix('home')->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('home.index');
    });

    Route::prefix('SpaceProject')->group(function () {
        Route::get('/', [SpaceProjectController::class, 'index'])->name('spaceProject.index');
        Route::prefix('RegisterProject')->group(function () {
            
            Route::get('/', [SpaceProjectController::class, 'registerProject'])->name('spaceProject.registerProject');

            Route::post('/Save', [SpaceProjectController::class, 'save'])->name('spaceProject.registerProject.save');


        });
    });

});










