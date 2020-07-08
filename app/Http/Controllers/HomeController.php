<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

        
    /**
     * index
     * 
     * Affiche la page d'accueil
     *
     * @return void
     */
    public function index()
    {
        return view('home');
    }
}
