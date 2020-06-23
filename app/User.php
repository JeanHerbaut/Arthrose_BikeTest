<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    public $timestamps = false;
    
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'person_id', 'username', 'password', 'company_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($password) {
        $this->attributes['password'] = Hash::make($password);
    }

    public function groups() {
        return $this->belongsToMany(Group::class);
    }

    public function testSchedules() {
        return $this->belongsToMany(TestSchedule::class);
    }

    public function tests() {
        return $this->hasMany(Test::class);
    }

    public function favourites() {
        return $this->belongsToMany(Product::class);
    }

    public function company() {
        return $this->belongsTo(Company::class);
    }

    public function person() {
        return $this->hasOne(Person::class);
    }
}
