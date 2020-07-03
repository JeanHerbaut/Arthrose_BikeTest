<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Category;
use App\Brand;
use App\Product;
use App\Bike;
use App\Test;
use App\Criteria_Test;
use App\Product_User;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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

        //dd($products);
        return view('catalogue')->with(compact('products'));
    }

    public function myBikes() {
        if(!Auth::user()) return view('auth.login');
        $favProducts = Product::whereHas('isFavoriteOf', function($q){
            return $q->where('user_id', '=', Auth::user()->id);
        })->with('brand')->get();//Auth::user()->favorites;
        $tests = Test::where('user_id', '=', Auth::user()->id)->with('product')->get();

        //dd($favProducts);
        return view('mesVelos')->with(compact('favProducts', 'tests'));
    }

    public function ratingPage($product_id) {
        if(!Auth::user()) return view('auth.login');
        $test = Test::where('product_id', '=', $product_id)->where('user_id', '=', Auth::user()->id)->first();
        $criterias_list = Criteria_Test::distinct('criteria_id')->where('test_id', '=', $test->id)->with('criteria')->get();
        if(!$test->rating){
            $test = Test::where('product_id', '=', $product_id)->where('user_id', '=', Auth::user()->id)->with('product.brand')->first();
            return view('ratingPage')->with(compact('test', 'criterias_list'));
        } else {
            return "déjà évalué";
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
    }

    public function show($id)
    {
        if(Auth::user()) {
            $product = Product::where('id', '=', $id)->with('brand')->with('tests.criterias')->withCount('tests')
            ->with(['isFavoriteOf' => function ($q) {
                return $q->where('user_id', '=', Auth::user()->id)->pluck('user_id')->toArray();
            }])->get()
            ->map(function ($p) {
                $p['avgNote'] = $p->tests()->get()->pluck('rating')->avg();
                return $p;
            })->first();
        } else {
            $product = Product::where('id', '=', $id)->with('brand')->with('tests.criterias')->withCount('tests')->get()
            ->map(function ($p) {
                $p['avgNote'] = $p->tests()->get()->pluck('rating')->avg();
                return $p;
            })->first();
        }

        $tests_ids = Test::where('product_id', '=', $id)->pluck('id')->toArray();

        //$criterias_list = array_unique(Criteria_Test::whereIn('test_id', $tests_ids)->with('criteria')->get()->pluck('criteria.name')->toArray());
        $criterias_list = Criteria_Test::distinct('criteria_id')->whereIn('test_id', $tests_ids)->pluck('criteria_id')->toArray();

        $criterias = [];
        foreach ($criterias_list as $criteria) {
            $note = ceil(Criteria_Test::whereIn('test_id', $tests_ids)->where('criteria_id', '=', $criteria)->avg('note'));
            $criterias[$criteria] = $note;
        }

        return view('velo')->with(compact('product', 'criterias'));
    }

    public function postModelNumber(Request $request)
    {
        $product = Product::where('modelNumber', $request->modelnumber)->first();
        return (response()->json(['product' => $product]));
    }

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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function fullCatalogue()
    {
    }
}
