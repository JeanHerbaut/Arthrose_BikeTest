<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Functionality extends Model
{
    public $timestamps = false;
    
    protected $fillable = ['name'];

    public function groups() {
        return $this->belongsToMany(Group::class);
    }
}
