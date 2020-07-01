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
        $products = Product::with('brand')->withCount('tests')->get()
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
        $product = Product::where('id', '=', $id)->with('brand')->with('tests.criterias')->withCount('tests')->get()
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
