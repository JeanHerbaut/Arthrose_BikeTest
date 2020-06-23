<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    public $timestamps = false;
    
    protected $fillable = ['person_id'];

    public function person() {
        return $this->hasOne(Person::class);
    }

    public function editions() {
        return $this->belongsToMany(Edition::class)->withPivot('jobTitle');
    }
}
