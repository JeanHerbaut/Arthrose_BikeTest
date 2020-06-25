<?php

namespace App\Http\Controllers;
use App\Brand;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class ExposantController extends Controller
{
    public function displayCatalogue() {
        $company_id = Auth::user()->company->id;
        $brand = Brand::findOrFail($company_id);
        $products = $brand->products;
        return view('gestionCatalogue')->with('products', $products);
    }
}
