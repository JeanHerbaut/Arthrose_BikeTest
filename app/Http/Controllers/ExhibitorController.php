<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Brand;
use App\Company;
use App\Product;

class ExhibitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('manageExhibitor', User::class);
        $companies = Company::all();
        return view('gestionExposant', compact('companies'));
    }

    public function exhibitorDatas(Request $request) {
        $id = (int)$request->companyId;
        $users = User::where('company_id', '=', $id)->with('person')->get();
        $bikes = Product::where('brand_id', '=', $id)
        ->with('bikes')
        ->with('brand')
        ->get();
        $company = Company::where('id', '=', $id)
        ->get();

        return (response()->json(['bikes'=>$bikes, 'users' => $users, 'company' =>$company]));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Company::create(
            ['name' => $request->name]
        );
        return redirect()->back();
    }
}
