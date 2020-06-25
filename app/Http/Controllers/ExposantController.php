<?php

namespace App\Http\Controllers;
use App\Brand;
use App\Category;
use App\Test;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class ExposantController extends Controller
{
    public function displayCatalogue() {
        $company_id = Auth::user()->company->id;
        $brand = Brand::findOrFail($company_id);
        $tests = Test::all();
        $products = $brand->products;
        foreach ($products as $product) {
            $moyenne_rating = 0;
            $nbr_votes = 0;
            $product->{'category'} = Category::findOrFail($product->category_id)->name;
            foreach ($tests as $test) {
                if ($test->product_id == $product->id) {
                    $moyenne_rating = $moyenne_rating + $test->rating;
                    $nbr_votes = $nbr_votes + 1;
                }
            }
            $product->{'nbr_rating'} = $nbr_votes;
            $product->{'rating'} = $moyenne_rating/2;
        }        
        return view('gestionCatalogue')->with('products', $products);
    }

    public function addProduct() {
        return "plop";
    }

    public function displayFormAddProduct() {
        return view('addProduct.blade.php');
    }
}
