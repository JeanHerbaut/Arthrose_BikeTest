<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Company;
use App\TestSchedule;
use App\Http\Controllers\CompanyController;

class UserController extends Controller
{
    public function index() {
        $users = User::with('company','testSchedules')
        ->orderBy('users.username')
        ->paginate(20);
        $testSchedules=TestSchedule::all();
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
        return view('adminConsultation', compact('users', 'testSchedules' ));
    }

    public function edit()
    {
    $id = htmlspecialchars($_GET["user_id"]);
    $user=User::findOrFail($id);
    $companies=Company::all();
    return view('adminModifyUser', compact('user', 'companies'));
    }
}
