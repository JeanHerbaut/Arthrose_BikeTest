<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Category;
use App\Brand;
use App\Product;
use App\Bike;
use App\Test;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $company_id = Auth::user()->company->id;
        $brand = Brand::findOrFail($company_id);
        return view('exhibitor/addProduct', compact('categories', 'brand'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product= [
            'modelNumber'=>$request['modelNumber'],
            'shortDesc'=> $request['shortDesc'],
            'longDesc'=>$request['longDesc'],
            'price'=>$request['price'],
            'brand_id' => $request['brand'],
            'category_id' => $request['categories']
        ];
        Product::create($product);
        $products = Product::all();
        foreach ($products as $product) {
            if($product->modelNumber == $request['modelNumber']) $product_id = $product->id;
        }
        $bike = [
            'product_id' => $product_id,
            'size' => $request->sizes,
            'distinctive_sign' => $request->distinctive_sign
        ];
        Bike::create($bike);
        return  $this->displayCatalogue(); 
    }

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
        return view('exhibitor/gestionCatalogue')->with('products', $products);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
