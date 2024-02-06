<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produits;
use App\Models\Categories;

class UserHomeController extends Controller
{
    // page acceuil du site
    public function index() {
        $produits = Produits::all();
        $categories = Categories::all();
        return view('userSite.index', compact('produits', 'categories'));
    }
}
