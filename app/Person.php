<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    public $timestamps = false;

    protected $fillable = ['name', 'firstname', 'phoneNumber', 'email', 'comment', 'adresse_id'];

    public function user() {
        return $this->hasOne(User::class);
    }

    public function staff() {
        return $this->hasOne(Staff::class);
    }

    public function adresse() {
        return $this->belongsTo(Adress::class);
    }

    public function companies() {
        return $this->belongsToMany(Company::class);
    }
}
