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
        return view('Admin.Clients.client');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
