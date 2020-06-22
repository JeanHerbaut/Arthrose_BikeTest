<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adress extends Model
{
    protected $fillable = ['street', 'secondStreet', 'streetNumber', 'poBox', 'city_id'];

    public function persons() {
        return $this->hasMany(Person::class);
    }

    public function cities() {
        return $this->belongsTo(City::class);
    }
}
