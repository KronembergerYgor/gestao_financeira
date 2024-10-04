<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\GraphicsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RevenuesAndExpensesController;
use App\Http\Controllers\SpaceProjectController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\UserController;
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


Route::prefix('Password')->group(function () {
    // Exibe o formulário de "esqueci a senha"
    Route::get('/forgot', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    // Processa o envio do e-mail de recuperação
    Route::post('/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

    Route::prefix('reset')->group(function () {
        // Exibe o formulário de redefinição de senha
        Route::get('/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');

        // Processa a redefinição da senha
        Route::post('/reset', [ResetPasswordController::class, 'reset'])->name('password.update');


    });


});



Route::middleware([checkAuth::class])->group(function () { //Autenticação de Login

    Route::prefix('Logout')->group(function () {
        Route::post('/', [LoginController::class, 'logout'])->name('logout');
    });
    
    Route::prefix('home')->group(function () {
        Route::match(['get', 'post'], '/', [HomeController::class, 'index'])->name('home.index');
        Route::post('/Filter', [HomeController::class, 'filter'])->name('home.filter');
    });
        
    Route::prefix('graphics')->group(function () {
        Route::get('/ExpenseForCategory', [GraphicsController::class, 'values_expenses_for_category'])->name('graphics.expenseForCategory');
        Route::get('/RevenuesAndExpenses', [GraphicsController::class, 'values_revenues_and_expenses'])->name('graphics.revenuesAndExpenses');
        Route::get('/RevenuesForCategory', [GraphicsController::class, 'values_revenues_for_category'])->name('graphics.revenuesForCategory');
        Route::get('/valuesCards', [GraphicsController::class, 'values_cards'])->name('graphics.valuesCards');
        Route::get('/update_charts', [GraphicsController::class, 'update_charts'])->name('graphics.updateCharts');
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
    
    Route::prefix('Perfil')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('perfil.index');
        Route::put('/update', [UserController::class, 'update'])->name('perfil.update');
    });

});










