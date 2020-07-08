<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
//use App\Category;
//use App\Brand;
use App\Product;
//use App\Bike;
use App\Test;
use App\Criteria_Test;
use App\Product_User;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
        
    /**
     * index
     * 
     * Récupère la liste des produits
     *
     * @return \Illuminate\View\View catalogue
     */
    public function index()
    {
        if (Auth::user()) {
            $products = Product::with('brand')->withCount('tests')
                ->with(['isFavoriteOf' => function ($q) {
                    return $q->where('user_id', '=', Auth::user()->id)->pluck('user_id')->toArray();
                }])->get()
                ->map(function ($p) {
                    $p['avgNote'] = $p->tests()->get()->pluck('rating')->avg();
                    return $p;
                });
        } else {
            $products = Product::with('brand')->withCount('tests')->get()
                ->map(function ($p) {
                    $p['avgNote'] = $p->tests()->get()->pluck('rating')->avg();
                    return $p;
                });
        }
        return view('catalogue')->with(compact('products'));
    }
    
    /**
     * myBikes
     * 
     * Retourne les favoris et les tests d'un utilisateur
     *
     * @return \Illuminate\View\View mesVelos
     */
    public function myBikes() {
        if(!Auth::user()) return view('auth.login');
        $favProducts = Product::whereHas('isFavoriteOf', function($q){
            return $q->where('user_id', '=', Auth::user()->id);
        })->with('brand')->withCount('tests')->get()
        ->map(function ($p) {
            $p['avgNote'] = $p->tests()->get()->pluck('rating')->avg();
            return $p;
        });
        
        $tests_rated = Test::where('user_id', '=', Auth::user()->id)->whereNotNull('rating')->whereNotNull('endTime')->with('product')->get();
        $tests_unrated = Test::where('user_id', '=', Auth::user()->id)->whereNull('rating')->whereNotNull('endTime')->with('product')->get();

        //dd($tests_unrated);
        return view('mesVelos')->with(compact('favProducts', 'tests_rated', 'tests_unrated'));
    }
    
    /**
     * ratingPage
     * 
     * Retourne la page de notation d'un vélo
     *
     * @param  int $test_id
     * @return \Illuminate\View\View ratingPage
     */
    public function ratingPage($test_id) {
        if(!Auth::user()) return view('auth.login');
        //$test = Test::where('product_id', '=', $product_id)->where('user_id', '=', Auth::user()->id)->with('criterias', 'product.brand')->first();
        $test = Test::where('id', '=', $test_id)->with('criterias', 'product.brand')->first();

        return view('ratingPage')->with(compact('test'));
    }
    
    /**
     * show
     * 
     * Affiche la page d'un produit avec ses avis et ses commentaires
     *
     * @param  int $id
     * @return \Illuminate\View\View velo
     */
    public function show($id)
    {
        if(Auth::user()) {
            $product = Product::where('id', '=', $id)->with('brand')->with('tests.criterias')->with('tests.user')->withCount('tests')
            ->with(['isFavoriteOf' => function ($q) {
                return $q->where('user_id', '=', Auth::user()->id)->pluck('user_id')->toArray();
            }])->get()
            ->map(function ($p) {
                $p['avgNote'] = $p->tests()->get()->pluck('rating')->avg();
                return $p;
            })->first();
        } else {
            $product = Product::where('id', '=', $id)->with('brand')->with('tests.criterias')->with('tests.user')->withCount('tests')->get()
            ->map(function ($p) {
                $p['avgNote'] = $p->tests()->get()->pluck('rating')->avg();
                return $p;
            })->first();
        }

        $tests_ids = Test::where('product_id', '=', $id)->pluck('id')->toArray();

        $criterias_list = Criteria_Test::distinct('criteria_id')->whereIn('test_id', $tests_ids)->with('criteria')->get()->pluck('criteria_id', 'criteria.name')->toArray();

        $criterias = [];
        foreach ($criterias_list as $criteria_name => $criteria_id) {
            $note = Criteria_Test::whereIn('test_id', $tests_ids)->where('criteria_id', '=', $criteria_id)->avg('note');
            $criterias[$criteria_name] = $note;
        }

        return view('velo')->with(compact('product', 'criterias'));
    }
    
    /**
     * postModelNumber
     * 
     * Retourne un produit selon son n° de modèle
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function postModelNumber(Request $request)
    {
        $product = Product::where('modelNumber', $request->modelnumber)->first();
        return (response()->json(['product' => $product]));
    }
    
    /**
     * toggleFavorite
     * 
     * Ajoute ou supprime un produit des favoris de l'utilisateur connecté
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function toggleFavorite(Request $request)
    {
        $isFavorite = Product_User::where('user_id', '=', Auth::user()->id)->where('product_id', '=', $request->productId)->first();
        if ($isFavorite) {
            $isFavorite->delete();
        } else {
            Auth::user()->favorites()->attach($request->productId);
        }
        $isFavorite = Product_User::where('user_id', '=', Auth::user()->id)->where('product_id', '=', $request->productId)->first();
        return (response()->json(['isFavorite' => $isFavorite]));
    }
}
