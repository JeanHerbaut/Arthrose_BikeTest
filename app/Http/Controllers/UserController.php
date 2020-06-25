<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserWithTicketRequest;
use App\Person;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function createWithTicket(UserWithTicketRequest $request) {
        $person = Person::create([
            'name' => $request['name'],
            'firstname' => $request['firstname'],
        ]);

        $user = User::create([
            'id' => $person->id,
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => $request['password'],
        ]);

        $user->testSchedules()->attach($request['plage']);
        
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('home');
        }
    }
}
