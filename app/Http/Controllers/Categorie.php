<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class categorie extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $afficher = Categories::get();
        return view('Admin.Categorie.categorie', compact("afficher"));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        Categories::created(["nom_categorie" => $request->Nom_categorie,]);
        return back();
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Étape 1 : Validation des données de la requête
        $validatedData = $request->validate([
            'nom_categorie' => 'required|string|max:255',
        ]);


        // Étape 3 : Création de la catégorie
        Categories::create([
            'nom_categorie' => $validatedData['nom_categorie'],
        ]);

        return back()->with('success', 'Catégorie ajoutée avec succès');
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
    public function update(Request $request, $category)
    {
        // Validation des données de la requête
        $request->validate([
            'nom_categorie' => 'required|string|max:255',
        ]);

        // Recherche de l'élément avec l'ID correspondant
        $element = Categories::find($category);

        if (!$element) {
            // Gérez le cas où l'élément n'a pas été trouvé
            return redirect()->route('categories.index')->with('error', 'L\'élément n\'existe pas.');
        }

        // Mise à jour du nom de la catégorie
        $element->nom_categorie = $request->nom_categorie;

        $element->save();

        return redirect()->route('categories.index')->with('success', 'L\'élément a été mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Recherche de l'élément avec l'ID correspondant
        $element = Categories::find($id);

        if (!$element) {
            // Gérez le cas où l'élément n'a pas été trouvé
            return redirect()->route('categories.index')->with('error', 'L\'élément n\'existe pas.');
        }

        // Suppression de la catégorie
        $element->delete();

        return redirect()->route('categories.index')->with('success', 'Catégorie supprimée avec succès');
    }

}
