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
        $products = Product::with('brand')->withCount('tests')
        ->with(['isFavoriteOf' => function($q) {
            return $q->where('user_id', '=', Auth::user()->id)->pluck('user_id')->toArray();
        }])->get()
        ->map(function ($p) {
            $p['avgNote'] = $p->tests()->get()->pluck('rating')->avg();
            return $p;
         });
        //dd($products);
        return view('catalogue')->with(compact('products'));
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
        $product = Product::where('id', '=', $id)->with('brand')->with('tests.criterias')->withCount('tests')
        ->with(['isFavoriteOf' => function($q) {
            return $q->where('user_id', '=', Auth::user()->id)->pluck('user_id')->toArray();
        }])->get()
        ->map(function ($p) {
            $p['avgNote'] = $p->tests()->get()->pluck('rating')->avg();
            return $p;
        })->first();

        $tests_ids = Test::where('product_id', '=', $id)->pluck('id')->toArray();

        $criterias_list = Criteria_Test::distinct('criteria_name')->whereIn('test_id', $tests_ids)->pluck('criteria_name')->toArray();

        $criterias = [];
        foreach($criterias_list as $criteria){
            $note = ceil(Criteria_Test::whereIn('test_id', $tests_ids)->where('criteria_name', '=', $criteria)->avg('note'));
            $criterias[$criteria] = $note;
        }

        //dd($criterias);
        return view('velo')->with(compact('product', 'criterias'));
    }

    public function postModelNumber(Request $request)
    {
        $product = Product::where('modelNumber', $request->modelnumber)->first();
        return (response()->json(['product'=>$product ]));
        
    }

    public function toggleFavorite(Request $request){
        $isFavorite = Product_User::where('user_id', '=', Auth::user()->id)->where('product_id', '=', $request->productId)->first();
        if($isFavorite){
            $isFavorite->delete();
        } else {
            Auth::user()->favorites()->attach($request->productId);
        }
        $isFavorite = Product_User::where('user_id', '=', Auth::user()->id)->where('product_id', '=', $request->productId)->first();
        return (response()->json(['isFavorite'=>$isFavorite ]));
    }
    public function toggleFavoriteGet($productId){
        $isFavorite = Product_User::where('user_id', '=', Auth::user()->id)->where('product_id', '=', $productId)->first();
       
        dd($isFavorite);
        return (response()->json(['isFavorite'=>$isFavorite ]));
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
    public function destroy($id) {
        //
    }

    public function fullCatalogue() {

    }
}
