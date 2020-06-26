<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserWithTicketRequest;
use Illuminate\Support\Facades\Auth;
use App\Policies\UserPolicy;
use App\User;
use App\Person;
use App\Company;
use App\TestSchedule;

class UserController extends Controller
{
    public function index()
    {
        $this->authorize('manage', User::class);
        $users = User::with('company', 'testSchedules')
            ->orderBy('users.username')
            ->paginate(20);
        $testSchedules = TestSchedule::all();
        foreach ($users as $user) {
            $user->{'name'} = $user->person->name;
            $user->{'firstname'} = $user->person->firstname;
            $billets = [];
            foreach ($user->testSchedules as $key => $testSchedule) {
                $day = date('d/m/Y', strtotime($testSchedule['startTime']));
                $endTime = date('H:i', strtotime($testSchedule['endTime']));
                $startTime = date('H:i', strtotime($testSchedule['startTime']));
                array_push($billets, array('schedule' => $day . " - " . $startTime . " : " . $endTime, 'id' => $testSchedule->id));
            }
            $user->{'schedules'} = $billets;
        }

        foreach ($testSchedules as $testSchedule) {
            $testSchedule['day'] = date('d/m/Y', strtotime($testSchedule['startTime']));
            $testSchedule['endTime'] = date('H:i', strtotime($testSchedule['endTime']));
            $testSchedule['startTime'] = date('H:i', strtotime($testSchedule['startTime']));
        }
        return view('adminConsultation', compact('users', 'testSchedules'));
    }

    public function edit()
    {
        $id = htmlspecialchars($_GET["user_id"]);
        $user = User::findOrFail($id);
        $companies = Company::all();
        return view('adminModifyUser', compact('user', 'companies'));
    }

    public function show() {
        $id = Auth::user()->id;
        $user = User::findOrFail($id);
        return view('auth/myProfile')->with('user', $user);
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
        }
    }
}