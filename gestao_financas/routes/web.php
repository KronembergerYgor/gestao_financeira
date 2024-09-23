<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RevenuesAndExpensesController;
use App\Http\Controllers\SpaceProjectController;
use App\Http\Controllers\StatusController;
use App\Http\Middleware\checkAuth;
use App\Models\RevenuesAndExpenses;
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

        Route::match(['get', 'post'], '/', [SpaceProjectController::class, 'index'])->name('spaceProject.index');
        Route::prefix('RegisterProject')->group(function () {
            
            Route::get('/', [SpaceProjectController::class, 'registerProject'])->name('spaceProject.registerProject');
            Route::post('/Save', [SpaceProjectController::class, 'save'])->name('spaceProject.registerProject.save');
            Route::delete('/Destroy/{id}', [SpaceProjectController::class, 'destroy'])->name('spaceProject.registerProject.destroy');
            Route::get('/Edit/{id}', [SpaceProjectController::class, 'edit'])->name('spaceProject.registerProject.edit');
            Route::put('/update/{id}', [SpaceProjectController::class, 'update'])->name('spaceProject.registerProject.update');

        });


        Route::prefix('revenuesAndExpenses')->group(function () {

            Route::match(['get', 'post'], '/{id}', [RevenuesAndExpensesController::class, 'index'])->name('revenuesAndExpenses.index');
            Route::get('/Create/{id}', [RevenuesAndExpensesController::class, 'create'])->name('revenuesAndExpenses.create');
            Route::post('/Save/{id}', [RevenuesAndExpensesController::class, 'save'])->name('revenuesAndExpenses.save');
            Route::delete('/Destroy/{id}', [RevenuesAndExpensesController::class, 'destroy'])->name('revenuesAndExpenses.destroy');
            Route::get('/Edit/{id}', [RevenuesAndExpensesController::class, 'edit'])->name('revenuesAndExpenses.edit');
            Route::put('/Update/{id}', [RevenuesAndExpensesController::class, 'update'])->name('revenuesAndExpenses.update');
            
        });



    });

    Route::prefix('Category')->group(function () {
        Route::match(['get', 'post'], '/', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/Create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/Save', [CategoryController::class, 'save'])->name('category.save');
        Route::delete('/Destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
        Route::get('/Edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::put('/Update/{id}', [CategoryController::class, 'update'])->name('category.update');


    });

    Route::prefix('Status')->group(function () {
        Route::match(['get', 'post'], '/', [StatusController::class, 'index'])->name('status.index');
        Route::get('/Create', [StatusController::class, 'create'])->name('status.create');
        Route::post('/Save', [StatusController::class, 'save'])->name('status.save');
        Route::delete('/Destroy/{id}', [StatusController::class, 'destroy'])->name('status.destroy');
        Route::get('/Edit/{id}', [StatusController::class, 'edit'])->name('status.edit');
        Route::put('/Update/{id}', [StatusController::class, 'update'])->name('status.update');



    });

});










