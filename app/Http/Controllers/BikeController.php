<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Bike;
use App\Product;
use App\Category;
use App\Brand;
use App\Test;
use App\Http\Requests\BikeRequest;
use Illuminate\Support\Facades\Auth;

class BikeController extends Controller
{    
    /**
     * index
     * 
     * Liste les vélos d'un exposant
     *
     * @return \Illuminate\View\View gestionCatalogue
     */
    public function index()
    {
        $this->authorize('manage', Product::class);
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
                        'distinctive_sign' => $bike->distinctive_sign,
                        'rating' => $moyenne_rating/2,
                        'nbr_rating' => $nbr_votes
                    ]);
                }
            }
        }        
        return view('exhibitor/gestionCatalogue')->with('bikes', $productBikes);
    
    }

        
    /**
     * create
     * 
     * Crée le formulaire d'ajout d'un vélo
     *
     * @return \Illuminate\View\View addProduct
     */
    public function create()
    {
        $this->authorize('manage', Product::class);
        $categories = Category::all();
        $company_id = Auth::user()->company->id;
        $brand = Brand::findOrFail($company_id);
        return view('exhibitor/addProduct', compact('categories', 'brand'));
    }
    
    /**
     * createBike
     * 
     * Crée un vélo et son produit lié s'il n'existe pas déjà
     *
     * @param  App\Http\Requests\BikeRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function createBike(BikeRequest $request){
        $product = Product::where('modelNumber', $request['modelNumber'])->first();
        if(!$product){
            $extension = $request->file('image')->getClientOriginalExtension();
            $path = $request->image->storeAs('img', 'img'.$request['modelNumber']. '.'. $extension); 
            $product= [
                'modelNumber'=>$request['modelNumber'],
                'shortDesc'=> $request['shortDesc'],
                'longDesc'=>$request['longDesc'],
                'price'=>$request['price'],
                'brand_id' => Brand::where('name', '=', $request['brand'])->first()['id'],
                'category_name' => $request['categories'],
                'image' => '/storage/img/'.'img'.$request['modelNumber']. '.'. $extension
            ];
            $product = Product::create($product);
        }

        $bike = [
            'product_id' => $product->id,
            'size' => $request->sizes,
            'distinctive_sign' => $request->distinctive_sign
        ];
        $bike = Bike::create($bike);
        return redirect('exposant/catalogue');
    }

        
    /**
     * destroy
     * 
     * Supprime un vélo
     *
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id) {
        $product = Bike::findOrFail($id)->delete();
        return redirect()->back();
    }
}
