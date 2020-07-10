<?php

namespace App\Http\Controllers;

use App\TestSchedule;

class BilleterieController extends Controller
{
        
    /**
     * displayForm
     * 
     * Affiche le formulaire d'inscription
     *
     * @return \Illuminate\View\View billeterie
     */
    public function displayForm() {
        $testSchedules = TestSchedule::all();
        $days_array = [];
        $formatedSchedules = [];
        setlocale(LC_ALL, 'fr_CH.utf8');
        foreach($testSchedules as $schedule){
            $startTime = strtotime($schedule['startTime']);
            $endTime = strtotime($schedule['endTime']);
            $day = strftime('%A %d %B', $startTime);
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
