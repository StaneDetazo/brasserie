<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produits;
use App\Models\Commandes;
use App\Models\Categories;

class PanierController extends Controller
{
    //
    public function index() {
        return view('userSite.panier');
    }

    //ajouter un produit au panier
    public function ajouterPanier($id_produit)
    {
        $produits = Produits::findOrFail($id_produit);
        $cart = session()->get('cart', []);
        if (isset($cart[$id_produit])) {
            $cart[$id_produit]['quantity']++;
        } else {
            $cart[$id_produit] = [
                'libelle_produit' => $produits->libelle_produit,
                'quantity' => 1,
                'prix_produit' => $produits->prix_produit,
                'image' => $produits->image
            ];
        }

        session()->put('cart', $cart);
        return back()->with('success', 'le produit a été ajouté avec succès');
    }


    public function delete_produit(Request $request, $libelle_produit)
    {
        //supprimer un produits du panier

        // Récupérez le panier de session
        $cart = session('cart');
        if (empty($cart)) {
            return back()->with('error', 'Le panier est vide.');
        }

        foreach ($cart as $id_produit => $details) {
            if ($details['libelle_produit'] === $libelle_produit) {
                // Supprimez le produit du panier
                unset($cart[$id_produit]);

                // Mettez à jour la session avec le panier modifié
                session(['cart' => $cart]);

                return redirect()->back()->with('success', 'Le produit a été supprimé du panier.');
            }
        }

        return redirect()->back()->with('error', 'Le produit n\'existe pas dans le panier.');

    }

    public function validerCommande()
    {
        //valider les commandes du panier
        // Récupérez les éléments actuels du panier depuis la session
        $panier = session('cart');
        if (empty($panier)) {
            return redirect()->back()->with('error', 'Le panier est vide.');
        }

        foreach ($panier as $id_produit => $details) {
            $produit = Produits::find($id_produit);

            if ($produit->stock_produit - $details['quantity'] < $produit->stock_critique) {
                // Le stock a atteint le niveau critque et ne peut plus etre vendu
                return redirect()->back()->with('error', 'Stock critique atteint pour le produit : ' . $produit->libelle_produit);
            }
        }

        // Enregistrez les éléments du panier dans la table d'historique
        foreach ($panier as $id_produit => $details) {
            Commandes::create([
                'produit_commande' => $details['libelle_produit'],
                'quantite_commande'=> $details['quantity'],
                'total_commande' => $details['prix_produit'] * $details['quantity'],
                // ... Ajoutez d'autres colonnes d'historique si nécessaire
            ]);
        }
        foreach ($panier as $id_produit => $details) {
            $produit = Produits::find($id_produit);
            $produit->stock_produit -= $details['quantity'];
            $produit->save();
        }

        // Videz le panier actuel
        session()->forget('cart');

        // Redirigez l'utilisateur vers une page de confirmation 
        return back()->with('success', 'Commande validée avec succès');
    }

    public function filtrer_produit(Request $request)
{
    // Récupérez toutes les catégories
    $categories = Categories::all();

    // Récupérez la catégorie sélectionnée
    $categorie_produit = $request->input('categorie_produit');

    // Vérifiez si la catégorie existe
    $categorie = Categories::where('nom_categorie', $categorie_produit)->first();

    if (!$categorie) {
        // La catégorie n'existe pas, renvoyez une erreur
        return back()->with('error', 'La catégorie sélectionnée n\'existe pas.');
    }

    // La catégorie existe, récupérez les produits filtrés par catégorie
    $produits = Produits::where('categorie_produit', $categorie_produit)->get();

    // Passez les catégories et les produits à la vue
    return view('userSite.index', compact('categories', 'produits'));
}
}
