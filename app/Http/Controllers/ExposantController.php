<?php

namespace App\Http\Controllers;
use App\User;
use App\Products;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class ExposantController extends Controller
{
    public function displayCatalogue() {
        $brands = Auth::user()->id;
        dd($brands);
/*         $users = User::with('products', 'company', 'brands')
        ->orderBy('brands.name')
        ->paginate(20);;
        return view('gestionCatalogue')->with('brands', $users); */
    }
}
