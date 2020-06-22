<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name'];

    public function users() {
        return $this->hasMany(User::class);
    }

    public function editions() {
        return $this->belongsToMany(Edition::class);
    }

    public function brands() {
        return $this->hasMany(Brand::class);
    }

    public function cities() {
        return $this->belongsToMany(City::class);
    }

    public function persons() {
        return $this->belongsToMany(Person::class);
    }
}
