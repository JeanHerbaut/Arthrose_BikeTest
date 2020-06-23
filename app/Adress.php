<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adress extends Model
{
    public $timestamps = false;
    
    protected $fillable = ['street', 'secondStreet', 'streetNumber', 'poBox', 'city_id'];

    public function persons() {
        return $this->hasMany(Person::class);
    }

    public function city() {
        return $this->belongsTo(City::class);
    }
}
