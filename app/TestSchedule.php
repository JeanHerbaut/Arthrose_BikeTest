<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestSchedule extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'startTime',
        'endTime', 
        'edition_id'
    ];

    public function edition() {
        return $this->belongsTo(Edition::class);  
    }

    public function tests() {
        return $this->hasMany(Test::class);
    }

    public function users() {
        return $this->belongsToMany(User::class);
    }
}
