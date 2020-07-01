<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;
use App\Bike;
use App\Product;
use App\TestSchedule;
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
        $this->authorize('view', Test::class);
        $company = Auth::user()->company_id;
        if($company) {
            $tests = Test::with('product', 'user')->whereHas('product.brand', function ($q) use ($company) {
                return $q->where('company_id', $company);
            })->orderBy('endTime', 'asc')->get();
        } else $tests = Test::with('product', 'user')->orderBy('endTime', 'asc')->get();
        
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
        if(Auth::user()->roles->first()->name == "admin" ){
            $products = Product::all()->pluck('id')->toArray();
        }else {
            $brands_ids = Auth::user()->company->brands->pluck('id')->toArray();
            $products = Product::whereIn('brand_id', $brands_ids)->get()->pluck('id')->toArray();
        }
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

        $currentTests = Test::whereIn('product_id', $products)->whereNull('endTime')
            ->with(['product' => function($q) {
                return $q->select('id', 'shortDesc', 'image');
            }])
            ->with(['user' => function($q) {
                return $q->select('id', 'username');
            }])
            ->with(['bike' => function($q) {
                return $q->select('id');
            }])->get();


        //dd($availableBikes);
        return view('gestionTest')->with(compact('availableBikes', 'currentTests'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('manage', Test::class);
        //$datetime = date("Y-m-d H:i:s"); We can't use that for the tests because it will not correspond to a test schedule
        $datetime = "2020-10-03 11:00:00";
        $test_schedule_id = TestSchedule::where('startTime', '<=', $datetime)->where('endtime', '>=', $datetime)->first()->id;
        //dd($test_schedule_id);
        Test::create([
            'startTime' => $datetime,
            'test_schedule_id' => $test_schedule_id,
            'product_id' => $request->product_id,
            'user_id' => $request->user_id,
            'bike_id' => $request->bike_id
        ]);

        return redirect("/gestionTest");
    }

    public function end(Request $request){
        $test = Test::whereNull('endTime')->where('bike_id', '=', $request->bike_id)->first();
        $datetime = "2020-10-03 12:00:00"; //En vrai on ferait date("Y-m-d H:i:s");
        $test->endTime = $datetime;
        $test->save();
        return redirect("/gestionTest");
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
