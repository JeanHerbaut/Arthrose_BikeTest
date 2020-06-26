<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserWithTicketRequest;
use App\User;
use App\Person;
use Illuminate\Support\Facades\Auth;
use App\Policies\UserPolicy;

class UserController extends Controller
{
    public function index(User $user) {
        $this->authorize('manage', User::class);
        return "liste des users";
    }

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
        $user->roles()->attach('visitor');
        
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('home');
        }
    }
}
