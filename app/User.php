<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    public $timestamps = false;
    public $incrementing = false;

    use Notifiable;

    protected $fillable = [
        'id', 'username', 'password', 'company_id', 'email', 'email_verified_at',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($password) {
        $this->attributes['password'] = Hash::make($password);
    }

    public function groups() {
        return $this->belongsToMany(Group::class, 'group_user', 'user_id','group_name');
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
        return $this->hasOne(Person::class, 'id', 'id');
    }
}
