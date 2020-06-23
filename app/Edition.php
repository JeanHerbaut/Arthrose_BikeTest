<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Edition extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'place', 'startDate', 'endDate', 'event_id',
    ];

    public function event() {
        return $this->belongsTo(Event::class);
    }

    public function testSchedules() {
        return $this->hasMany(TestSchedule::class);
    }

    public function products() {
        return $this->belongsToMany(Product::class);
    }

    public function companies() {
        return $this->belongsToMany(Company::class);
    }

    public function staffs() {
        return $this->belongsToMany(Staff::class)->withPivot('jobTitle');
    }

}
