<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Produits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProduitsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $afficher = Produits::get();
        $lister = Categories::get();
        return view('Admin.Produits.produits', compact('afficher', 'lister'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'libelle_produit' => 'required|string|max:255',
            'prix_produit' => 'required|numeric', // Assurez-vous que le champ est numérique
            'categorie_produit' => 'required|string|max:255',
            'stock_produit' => 'required|numeric',
            'stock_critique' => 'required|numeric',
            'image' => 'required|image|mimes:jpg,jpeg,png,svg'
        ], [
            'libelle_produit.required' => 'Le champ libellé du produit est requis.',
            'prix_produit.required' => 'Le champ prix du produit est requis.',
            'prix_produit.numeric' => 'Le champ prix du produit doit être un nombre.', // Message d'erreur personnalisé
            'categorie_produit.required' => 'Le champ catégorie du produit est requis.',
            'stock_produit.required' => 'Le champ stock du produit est requis.',
            'stock_produit.numeric' => 'Le champ stock doit être un nombre.',
            'stock_critique.required' => 'Le champ stock critique du produit est requis.',
            'stock_critique.numeric' => 'Le champ stock critique doit est un nombre.',
            'image.required' => 'L\'image du produit est requise.',
            'image.image' => 'Le fichier doit être une image.',
            'image.mimes' => 'L\'image doit être au format jpg, jpeg, png ou svg.',
        ]);
        $image = $request->file('image');
        $imagePath = 'images/';
        $uniqueImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($imagePath, $uniqueImage);
        $validatedData['image'] = $uniqueImage;

        // Utilisez la méthode "create" pour créer un nouveau produit
        Produits::create($validatedData);

        return back()->with('success', 'Produit ajouté avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $afficher = Produits::where('id_produit', $id)->first();

        if (!$afficher) {
            abort(404); // Produit non trouvé, affiche une page d'erreur 404
        }

        return view('produit.show', compact('afficher'));
        //
    }

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
        $request->validate([
            'libelle_produit' => 'required',
            'prix_produit' => 'required',
            'categorie_produit' => 'required',
            'stock_produit' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png,svg',
            // 'required' n'est pas nécessaire ici
            'stock_critique' => 'required',
        ]);

        // Obtenez l'élément à mettre à jour en fonction de l'ID
        $element = Produits::find($id);

        if (!$element) {
            // Gérez le cas où l'élément n'a pas été trouvé (ID invalide, par exemple)
            return redirect()->route('produit.index')->with('error', 'L\'élément n\'existe pas.');
        }

        // Mettez à jour l'image uniquement si elle est fournie
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = 'images/';
            $uniqueImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($imagePath, $uniqueImage);
            $element->image = $uniqueImage;
        }

        // Mettez à jour les autres champs
        $element->libelle_produit = $request->libelle_produit;
        $element->prix_produit = $request->prix_produit;
        $element->categorie_produit = $request->categorie_produit;
        $element->stock_produit = $request->stock_produit;
        $element->stock_critique = $request->stock_critique;

        $element->save();

        // Redirigez l'utilisateur ou renvoyez une réponse JSON appropriée
        return redirect()->route('produit.index')->with('success', 'L\'élément a été mis à jour avec succès.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $element = Produits::where('id_produit', $id)->first();

        if (!$element) {
            return redirect()->route('produit.index')->with('error', 'Le produit que vous essayez de supprimer n\'existe pas.');
        }

        // L'élément existe, vous pouvez le supprimer en toute sécurité
        $element->delete();

        return redirect()->route('produit.index')->with('success', 'Produit supprimé avec succès');
    }

}
