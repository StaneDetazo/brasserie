<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserHomeController extends Controller
{
    // page acceuil du site
    public function index() {
        return view('userSite.index');
    }
}
