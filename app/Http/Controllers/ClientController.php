<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $clients = User::all();
        return view('Admin.Clients.client', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Admin.Client.createClient');
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     //
    //     $dataValid = $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|string|unique:users,email',
    //         'password' => 'required|min:8',
    //         'contact' => 'required',
    //         'adresse' => 'required',
    //     ], [
    //         'name.required' => 'Le champ nom est requis.',
    //         'email.required' => 'Le champ email est requis.',
    //         'email.unique' => 'Cet nom d utilisateur est déjà utilisée par un autre utilisateur.',
    //         'password.required' => 'Le champ mot de passe est requis.',
    //         'password.min' => 'Le mot de passe doit contenir au moins :min caractères.',
    //         'contact.required' => 'Le champ contact est requis.',
    //     ]);
    //      // Hasher le mot de passe
    //      $dataValid['password'] = bcrypt($dataValid['password']);


    //      // Créer un nouvel utilisateur
    //      User::create($dataValid);
         
     
    //  return redirect('/admin/client')->with('success', 'Le personnel a été ajouté avec succès.');

    // }

    public function creer ( Request $request ) {
        //
        $user = new User();

        $user->name = $request->nom;
        $user->email = $request->email;
        $user->password = Hash::make($request->motPasse);            
        $user->contact = $request->motPasse;            
        $user->adresse = $request->motPasse;            
        
        $user->save();

        return back()->with('success', 'connexion réussie');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function PageInscription () {
        //page d'inscription client
        return view('userSite.Comptes.inscription');
    }

    public function inscription ( Request $request ) {
        //
        $user = new User();

        $user->name = $request->nom;
        $user->email = $request->email;
        $user->password = Hash::make($request->motPasse);            
        $user->contact = $request->motPasse;            
        $user->adresse = $request->motPasse;            
        
        $user->save();

        return redirect('/')->with('success', 'inscription réussie');
    }

    public function connexion ( Request $request ) {
        //
        $credetials = [
            'email' => $request->email,
            'password' => $request->motPasse,
        ];
            // dd($credetials);
        if (Auth::attempt($credetials)) {
            return redirect('/')->with('success', 'connexion réussi');
        }

        return back()->with('error', 'Email ou mot de passe incorrect');
    }

    public function deconnexion () {
        Auth::logout();
        request()->session()->forget('user');
        return redirect('/')->with('success', 'déconnexion réussi');
    }
}
