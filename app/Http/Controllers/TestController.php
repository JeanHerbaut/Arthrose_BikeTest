<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RateRequest;
use App\Test;
use App\Bike;
use App\Product;
use App\TestSchedule;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Criteria_Test;
use App\Category_Criteria;

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
            ->WhereDoesntHave('tests', function($query) {
                return $query->whereNull('endTime');
            })
            ->get();

        $busyBikes = Bike::whereIn('product_id', $products)->with('product')->whereHas('tests', function($query) {
            return $query->whereNull('endTime');
        })->get();

        $currentTests = Test::whereIn('product_id', $products)->whereNull('endTime')
            ->with('product.brand')
            ->with(['user' => function($q) {
                return $q->select('id', 'username');
            }])
            ->with(['bike' => function($q) {
                return $q->select('id');
            }])->get();


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
        $criterias_list = Category_Criteria::where('category_name', '=', $request->category)->pluck('criteria_id')->toArray();
        $test = Test::create([
            'startTime' => $datetime,
            'test_schedule_id' => $test_schedule_id,
            'product_id' => $request->product_id,
            'user_id' => $request->user_id,
            'bike_id' => $request->bike_id
        ]);
        foreach($criterias_list as $criteria){
            $test->criterias()->attach($criteria);
        }

        return redirect("/gestion-test");
    }

    public function end(Request $request){
        $test = Test::whereNull('endTime')->where('bike_id', '=', $request->bike_id)->first();
        $datetime = "2020-10-03 12:00:00"; //En vrai on ferait date("Y-m-d H:i:s");
        $test->endTime = $datetime;
        $test->save();
        return redirect("/gestion-test");
    }

    public function rate(RateRequest $request){
        $test = Test::find($request->test_id);
        $criterias_list = Criteria_Test::distinct('criteria_id')->where('test_id', '=', $request->test_id)->pluck('criteria_id')->toArray();
        $test->rating = $request->critglobal;
        if($request->comment) $test->comment = $request->comment;
        $test->save();
        foreach($criterias_list as $criteria){
            $criteria_test = Criteria_Test::where('test_id', '=', $request->test_id)->where('criteria_id', '=', $criteria)->first();
            $criteria_test->note = $request->{'crit'.$criteria};
            $criteria_test->save();
        }

        return redirect()->route('mesvelos');
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
