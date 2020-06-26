<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'name';
    public $incrementing = false;
    protected $fillable = ['name'];

    public function functionalities() {
        return $this->belongsToMany(Functionality::class);
    }

    public function users() {
        return $this->belongsToMany(User::class);
    }
}
