<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserWithTicketRequest;
use App\Person;
use App\User;
use Illuminate\Support\Facades\Hash;

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
            'password' => Hash::make($request['password']),
        ]);

        $user->testSchedules()->attach($request['plage']);
        
        return view('userAdded');
    }
}
