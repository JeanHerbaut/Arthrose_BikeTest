<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $timestamps = false;
    
    protected $fillable = ['zip', 'name', 'state', 'country_id'];

    public function adresses() {
        return $this->hasMany(Adress::class);
    }

    public function country() {
        return $this->belongsTo(Country::class);
    }

    public function companies() {
        return $this->belongsToMany(Company::class);
    }
}
