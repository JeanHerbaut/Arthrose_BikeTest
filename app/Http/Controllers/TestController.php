<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;
use App\Bike;
use App\Product;
use Illuminate\Support\Facades\Auth;
use App\User;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('manage', User::class);
        $tests = Test::with('product', 'user')
            ->get();
        foreach ($tests as $test) {
            $test->{'shortDesc'} = $test->product->shortDesc;
            $test->{'username'} = $test->user->username;
        }
        return view('gestionTestHistorique')->with('tests', $tests);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('manage', Test::class);
        $brands_ids = Auth::user()->company->brands->pluck('id')->toArray();
        $products = Product::whereIn('brand_id', $brands_ids)->get()->pluck('id')->toArray();
        $availableBikes = Bike::whereIn('product_id', $products)
            ->with('product')
            ->with(['product.brand' => function($q) {
                return $q->select('id', 'name');
            }])
            ->WhereDoesntHave('product.tests', function($query) {
                return $query->whereNull('endTime');
            })
            ->get();
        $busyBikes = Bike::whereIn('product_id', $products)->with('product')->whereHas('product.tests', function($query) {
            return $query->whereNull('endTime');
        })->get();


        //dd($availableBikes);
        return view('gestionTest')->with(compact('availableBikes', 'busyBikes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
