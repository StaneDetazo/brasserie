<?php

use App\Http\Controllers\UserHomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    Route::get('/panier', [PanierController::class, 'index'])->name('panier');
    Route::get('filtreproduit', [PanierController::class, 'filtrer_produit'])->name('filtre.P');
    Route::get('vider', [PanierController::class, 'vider_panier'])->name('vider.P');



// inscription et connexion
route::group(['middleware' => 'guest'], function () {
    Route::get('/inscription', [ClientController::class, 'pageInscription'])->name('inscription');
    Route::post('/inscrire', [ClientController::class, 'inscription'])->name('inscrire');
    Route::post('/connexion', [ClientController::class, 'connexion'])->name('connexion');
});

route::group(['middleware' => 'auth'], function () {
    Route::delete('deconnexion', [ClientController::class, 'deconnexion']);
    Route::get('produitpanier/{id_produit}', [PanierController::class, 'ajouterPanier'])->name('ajouterPanier.ajout');
    Route::delete('supprimer/{libelle_produit}', [PanierController::class, 'delete_produit'])->name('supprimerProduits.P');

    Route::post('/validercommande', [PanierController::class, 'validerCommande'])->name('commande.valider');
});


/****ADMIN */
// page admin 
    Route::get('/admin/signup', [AdminController::class, 'signUpPage'])->name('signUpPage');
    Route::post('/admin/signup', [AdminController::class, 'signUp'])->name('adminSignUp');
    Route::get('/admin/login', [AdminController::class, 'loginPage'])->name('loginPage');
    Route::post('/admin/login', [AdminController::class, 'login'])->name('adminLogin');
    Route::get('/admin/acceuil', [AdminController::class, 'index'])->name('adminAcceuil');
    Route::get('/admin/commandes', [AdminController::class, 'mes_commandes'])->name('mesCommandes');
    Route::get('/admin/addProduct', [AdminController::class, 'ajouter_produit'])->name('addProduct');
    Route::post('/admin/createProduct', [AdminController::class, 'create_product'])->name('createProduct');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
