<?php

namespace App\Http\Controllers;

use App\Models\Grossiste;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    
    public function index() {
        return view('Admin.home');
    }

    public function login(){
        return view('Admin.login');
    }

    public function signup(){
        return view('Admin.signup');
    }

    public function createGrossiste(Request $request){
       try{
            // Validation des données
        $request->validate([
            'nom' => 'required|string',
            'adresse'=>'required|string',
            'telephone'=>'required|string',
            'email' => 'required|email|unique:grossistes',
            'password' => 'required|string|min:6',
        ]);

        // Création de l'utilisateur
        $grossiste = Grossiste::create([
            'nom' => $request->input('nom'),
            'adresse' => $request->input('adresse'),
            'telephone' => $request->input('telephone'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        // Retournez une réponse ou redirigez l'utilisateur
        return response()->json(['message' => 'Utilisateur créé avec succès', 'user' => $grossiste], 201);
       }catch (\Exception $e) {
        // Code qui sera exécuté en cas d'exception
        dd("Une exception a été capturée : " . $e->getMessage());
    }
        

    }



}
