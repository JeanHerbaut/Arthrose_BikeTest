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
        $this->authorize('manageProducts', Product::class);
        $company_id = Auth::user()->company->id;
        $brand = Brand::findOrFail($company_id);
        $brandName = $brand->name;
        $tests = Test::all();
        $products = $brand->products;
        $bikes = Bike::aLL();
        $productBikes = [];
        foreach ($products as $product) {
            $moyenne_rating = 0;
            $nbr_votes = 0;
            foreach ($tests as $test) {
                if ($test->product_id == $product->id) {
                    $moyenne_rating = $moyenne_rating + $test->rating;
                    $nbr_votes = $nbr_votes + 1;
                }
            }
            foreach ($bikes as $bike) {
                if ($bike->product_id == $product->id) {
                    array_push($productBikes, [
                        'id' => $bike->id,
                        'product_id' => $product->id,
                        'shortDesc' => $product->shortDesc,
                        'longDesc' => $product->longDesc,
                        'image' => $product->image,
                        'price' => $product->price,
                        'category' => $product->category_name,
                        'brand_id' => $product->brand_id, 
                        'brand' => $brandName,
                        'deleted_at' => $bike->deleted_at,
                        'size' => $bike->size,
                        'dinstictive_sign' => $bike->distinctive_sign,
                        'rating' => $moyenne_rating/2,
                        'nbr_rating' => $nbr_votes
                    ]);
                }
            }
        }        
        return view('exhibitor/gestionCatalogue')->with('bikes', $productBikes);
    
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
        $extension = $request->file('image')->getClientOriginalExtension();
        $image = $request->image->storeAs('img', 'img'.$request->modelNumber . '.'. $extension); 
        $product= [
            'modelNumber'=>$request['modelNumber'],
            'shortDesc'=> $request['shortDesc'],
            'longDesc'=>$request['longDesc'],
            'price'=>$request['price'],
            'brand_id' => $request['brand'],
            'category_id' => $request['categories'],
            'image' => 'storage/img/'.'img'.$request->modelNumber. '.'. $extension
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
        return  $this->index(); 
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
    public function destroy($id) {
        $product = Bike::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function fullCatalogue() {

    }
}
