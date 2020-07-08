<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
//use App\Providers\RouteServiceProvider;
use App\User;
use App\Person;
use Illuminate\Foundation\Auth\RegistersUsers;
//use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

        
    /**
     * register
     *
     * Ajoute une Personne et un utilisateur lié
     * 
     * @param  App\Http\Requests\RegisterRequest $request
     * @return \Illuminate\View\View userAdded
     * 
     */
    public function register(RegisterRequest $request)
    {
        $person = Person::create([
            'name' => $request->name,
            'firstname' => $request->firstname,
        ]);

        $user = User::create([
            'id' => $person->id,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return view('/userAdded')->with(compact('person', 'user'));
    }

    /**
     * showRegistrationForm
     *
     * Affiche le formulaire de création de compte
     * 
     * @return \Illuminate\View\View register
     */
    public function showRegistrationForm(){
        return view('auth/register');
    }
}
