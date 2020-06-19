<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Edition extends Model
{
    protected $fillable = [
        'place', 'startDate', 'endDate'
    ];

    //belongs to
    public function event() {
        return $this->belongsTo(Event::class);
    }

    //has many
    public function testSchedules() {
        return $this->hasMany(TestSchedule::class);
    }
}
