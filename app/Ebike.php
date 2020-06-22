<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ebike extends Model
{
    protected $fillable = [
        //à compléter
    ];
    
    public function bike(){
        return $this->hasOne(Bike::class);
    }
}
