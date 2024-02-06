<?php

namespace App\Http\Controllers;

use App\Models\Grossiste;
use App\Models\Categories;
use App\Models\Produits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    private $folder = "boisson";
    
    public function index() {
        return view('Admin.home');
    }

    public function loginPage(){
        return view('adminSite.comptes.inscription');
    }

    public function signUpPage(){
        return view('adminSite.comptes.inscription');
    }

    public function login(Request $request){
         //
         $credetials = [
            'email' => $request->email,
            'password' => $request->motPasse,
        ];
            // dd($credetials);
        if (Auth::attempt($credetials)) {
            return view("Admin.home");
        }

        return back()->with('error', 'Email ou mot de passe incorrect');
    }

    public function acceuil(){
        $categories = Categories::all();
        return view('adminSite.index', compact('categories'));
    }

    public function mes_commandes(){
        return view('adminSite.mesCommandes');
    }

    public function ajouter_produit(){
        return view('adminSite.produits');
    }

    public function create_product(Request $request){
        $product = new Produits();

        $product->libelle_produit = $request->libelle_produit;
        $product->prix_produit = $request->prix_produit;
        $product->categorie_produit = $request->categorie_produit;

        $org_name = $request->file('image');
        $product->image = saveImage($org_name,$this->folder);

        $product->save();

    }
    
    public function signUp(Request $request){
        $grossiste = new Grossiste();

        $grossiste->nom = $request->nom;
        $grossiste->adresse = $request->adresse;
        $grossiste->telephone = $request->telephone;
        $grossiste->email = $request->email;
        $grossiste->password = Hash::make($request->motPasse);            
        
        $grossiste->save();

        return redirect('/admin/login')->with('success', 'inscription réussie');
    }


}
