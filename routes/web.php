<?php

use App\Http\Controllers\UserHomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProduitsController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\Categorie;
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

    Route::get('/admin/client', [ClientController::class, 'index'])->name('client');
    Route::post('/admin/ajouterclient', [ClientController::class, 'creer'])->name('ajouterclients');

    Route::get('/admin/commandes', [AdminController::class, 'mes_commandes'])->name('mesCommandes');
    Route::get('/admin/addProduct', [AdminController::class, 'ajouter_produit'])->name('addProduct');
    Route::post('/admin/createProduct', [AdminController::class, 'create_product'])->name('createProduct');

     // concernant les categories
     Route::resource('/categorie', 'Categorie');
     Route::get('/admin/categorie', [Categorie::class, 'index'])->name('categorie');
     Route::resource('categories', Categorie::class);
     Route::post('categories/{id}', [Categorie::class, 'update'])->name('modifier');
     Route::delete('categories/{id}', [Categorie::class, 'destroy'])->name('destroy');

      // concernant les commandes
      Route::resource('/commande', 'CommandeController');
      Route::get('/admin/commande', [CommandeController::class, 'index'])->name('commande');
      Route::resource('commande', CommandeController::class);
      Route::post('commande/{id}', [CommandeController::class, 'update'])->name('modifierc');
      Route::delete('commande/{id}', [CommandeController::class, 'destroy'])->name('destroyc');
 

       //Concernant les produits
       Route::get('/admin/produit', [ProduitsController::class, 'index'])->name('produits');
       Route::post('produit/{id}', [ProduitsController::class, 'update'])->name('modifierproduit');
       Route::resource('produit', ProduitsController::class);
       Route::delete('produit/{id}', [ProduitsController::class, 'destroy'])->name('detruireproduit');
       Route::get('produit/{id}', [ProduitsController::class, 'show'])->name('voir');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
