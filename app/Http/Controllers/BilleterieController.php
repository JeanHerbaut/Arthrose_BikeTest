<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TestSchedule;
use stdClass;

class BilleterieController extends Controller
{
    public function displayForm() {
        $testSchedules = TestSchedule::all();
        $days_array = [];
        $formatedSchedules = [];
        setlocale(LC_ALL, 'fr_CH.utf8');
        foreach($testSchedules as $schedule){
            $startTime = strtotime($schedule['startTime']);
            $endTime = strtotime($schedule['endTime']);
            $day = strftime('%A %d %B', $startTime);
            //array_push($days, (object)[$day=>[]]);
            $days_array[$day] = [];
            $schedule['day'] = $day;
            $schedule['startTime'] = date('H:i', $startTime);
            $schedule['endTime'] = date('H:i', $endTime);
        }
        $days = (object)$days_array;
        foreach($testSchedules as $schedule){
            array_push($days->{$schedule['day']}, $schedule);
        }
        return view('auth.billeterie')->with(compact('days'));
    }
}
