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
     * index
     * 
     * Récupère la liste des exposants
     *
     * @return \Illuminate\View\View gestionExposant
     */
    public function index()
    {
        $this->authorize('manageExhibitor', User::class);
        $companies = Company::all();
        return view('gestionExposant', compact('companies'));
    }
    
    /**
     * exhibitorDatas
     *
     * Récupère les données d'un exposant
     * 
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
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
     * store
     * 
     * Crée un exposant
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        Company::create(
            ['name' => $request->name]
        );
        $id = Company::where('name', '=', $request->name)->get();
        Brand::create(
            [
                'name' => $request->name,
                'company_id' => $id[0]->id
            ]
            );
        return redirect()->back();
    }
}
