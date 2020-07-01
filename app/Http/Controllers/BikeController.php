<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bike;
use App\Product;
use App\Category;
use App\Brand;
use App\Http\Requests\BikeRequest;

class BikeController extends Controller
{
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
                'brand_id' => Brand::where('name', $request['brand'])->first()['id'],
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
}
