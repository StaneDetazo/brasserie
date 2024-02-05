<?php

use App\Http\Controllers\UserHomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\ClientController;
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

/***CLIENT */
// page acceuil site client
Route::get('/', [UserHomeController::class, 'index'])->name('acceuilclient');
// interface panier client
Route::get('/client', [ClientController::class, 'index'])->name('client');

// inscription et connexion
route::group(['middleware' => 'guest'], function () {
    Route::get('/inscription', [ClientController::class, 'pageInscription'])->name('inscription');
    Route::post('/inscrire', [ClientController::class, 'inscription'])->name('inscrire');
    Route::post('/connexion', [ClientController::class, 'connexion'])->name('connexion');
});

route::group(['middleware' => 'auth'], function () {
    Route::get('/panier', [PanierController::class, 'index']);
    Route::delete('deconnexion', [ClientController::class, 'deconnexion']);
});


/****ADMIN */
// page admin 
// Route::get('/admin', [DashboardController::class, 'index'])->name('acceuilAdmin');
Route::get('/admin/login', [DashboardController::class, 'login'])->name('login');
Route::get('/admin/signUp', [DashboardController::class, 'signup'])->name('signUp');
Route::post('/admin/signUp/create', [DashboardController::class, 'createGrossiste'])->name('createGrossiste');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
