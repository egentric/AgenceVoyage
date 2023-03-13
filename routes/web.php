<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['guest']], function () {
    // Connexion
    Route::get('/login', [App\Http\Controllers\AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login.connection');


    // Register
    Route::get('/register', [App\Http\Controllers\AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [App\Http\Controllers\AuthController::class, 'register'])->name('register.register');

    // Mot de passe oublié
    Route::get('forget-password', [App\Http\Controllers\AuthController::class, 'showForgetPasswordForm'])->name('forget.password.get');
    Route::post('forget-password', [App\Http\Controllers\AuthController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
    Route::get('reset-password/{token}', [App\Http\Controllers\AuthController::class, 'showResetPasswordForm'])->name('reset.password.get');
    Route::post('reset-password', [App\Http\Controllers\AuthController::class, 'submitResetPasswordForm'])->name('reset.password.post');
});

/**
 * Utilisateur connecté
 */

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['role:admin'], 'prefix' => 'dashboard'], function () {
        Route::get('/', function() { 
            return 'Page access only admin';
        });
        Route::resource('/themes', \App\Http\Controllers\ThemeController::class);
        Route::resource('/types', \App\Http\Controllers\TypeController::class);
        Route::resource('/countries', \App\Http\Controllers\CountryController::class);
        Route::resource('/cities', \App\Http\Controllers\CityController::class);
    });
    // Déconnexion
    Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
});
