<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Person;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    public function register(RegisterRequest $request)
    {
        //dd($request);
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

    public function showRegistrationForm(){
        $this->authorize('manage', User::class);
        return view('auth/register');
    }
}
