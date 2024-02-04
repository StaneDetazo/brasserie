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
Route::get('/', [UserHomeController::class, 'index'])->name('home');
// interface panier client
Route::get('/panier', [PanierController::class, 'index'])->name('panier');
Route::get('/client', [ClientController::class, 'index'])->name('client');

/****ADMIN */
// page admin 
Route::get('/admin', [DashboardController::class, 'index'])->name('home');


