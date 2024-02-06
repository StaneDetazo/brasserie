<?php

namespace App\Http\Controllers;

use App\Models\Produits;
use App\Models\Commandes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $afficher = Commandes::get();
        return view('Admin.Commande.commande', compact("afficher"));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Étape 1 : Validation des données de la requête
        $validatedData = $request->validate([
            'produit_commande' => 'required|string|max:255',
            'total_commande' => 'required|int|max:255',
            'quantite_commande' => 'required|int|max:255',
        ]);


        // Étape 3 : Création de la catégorie
        Commandes::create($validatedData);


        return back()->with('success', 'commande ajoutée avec succès');
    }



    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
        
    // }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    // {
        
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validation des données de la requête
        $validatedData = $request->validate([
            'produit_commande' => 'required|string|max:255',
            'total_commande' => 'required|int',
            'quantite_commande' => 'required|int',
        ]);
        // Recherche de l'élément avec l'ID correspondant
         $element = Commandes::where('id_commande', $id)->first();

        // if (!$element) {
        //     // Gérez le cas où l'élément n'a pas été trouvé
        //     return redirect()->route('categories.index')->with('error', 'L\'élément n\'existe pas.');
        // }

        // Mise à jour du nom de la catégorie
        $element->produit_commande = $request->produit_commande;
        $element->total_commande = $request->total_commande;
        $element->quantite_commande = $request->quantite_commande;

        $element->save();

        return back()->with('success', 'L\'élément a été mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Recherche de l'élément avec l'ID correspondant
         $element = Commandes::where('id_commande', $id)->first();

        // if (!$element) {
        //     // Gérez le cas où l'élément n'a pas été trouvé
        //     return redirect()->route('categories.index')->with('error', 'L\'élément n\'existe pas.');
        // }

        // Suppression de la catégorie
        $element->delete();

        return back()->with('success', 'Catégorie supprimée avec succès');
    }

}
